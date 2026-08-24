<?php

namespace App\Http\Controllers;

use App\Models\AffiliationRequest;
use App\Models\Affilie;
use App\Models\Message;
use App\Support\MouchapCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AffiliationRequestController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            AffiliationRequest::query()
                ->latest()
                ->get()
                ->map(fn (AffiliationRequest $item) => $item->toApiArray())
                ->values()
        );
    }

    public function nextCode(): JsonResponse
    {
        return response()->json(['id' => MouchapCodes::nextAffiliationCode()]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nom_complet' => ['required', 'string', 'max:255'],
            'titre' => ['required', 'string', 'max:120'],
            'cin' => ['required', 'string', 'max:40'],
            'contact' => ['required', 'digits:10'],
            'ville' => ['required', 'string', 'max:120'],
            'rib' => ['required', 'digits:24'],
            'banque' => ['required', 'string', 'max:120'],
        ]);

        $data['cin'] = MouchapCodes::normalizeCin($data['cin']);
        $data['contact'] = preg_replace('/\D+/', '', $data['contact']) ?? $data['contact'];
        $data['nom_complet'] = trim(preg_replace('/\s+/', ' ', $data['nom_complet']));

        if ($existingAffilie = MouchapCodes::findExistingAffilie($data['cin'], $data['contact'])) {
            throw ValidationException::withMessages([
                'cin' => "Un affilié existe déjà pour ce CIN/contact ({$existingAffilie->code}).",
            ]);
        }

        $duplicateRequest = AffiliationRequest::query()
            ->whereIn('status', ['pending', 'validated'])
            ->where(function ($query) use ($data) {
                $query->where('cin', $data['cin'])
                    ->orWhere('contact', $data['contact']);
            })
            ->latest()
            ->first();

        if ($duplicateRequest) {
            if ($duplicateRequest->status === 'pending') {
                return response()->json([
                    ...$duplicateRequest->toApiArray(),
                    'message' => 'Une demande est déjà en attente pour ce CIN/contact.',
                ], 200);
            }

            throw ValidationException::withMessages([
                'cin' => 'Une demande validée existe déjà pour ce CIN/contact.',
            ]);
        }

        $item = AffiliationRequest::create([
            ...$data,
            'code' => MouchapCodes::nextAffiliationCode(),
            'status' => 'pending',
        ]);

        return response()->json($item->toApiArray(), 201);
    }

    public function updateStatus(Request $request, AffiliationRequest $affiliationRequest): JsonResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['pending', 'validated', 'cancelled', 'suspended'])],
        ]);

        return DB::transaction(function () use ($affiliationRequest, $data) {
            $locked = AffiliationRequest::query()
                ->whereKey($affiliationRequest->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($data['status'] === 'validated' && $locked->status === 'validated' && $locked->affilie_id) {
                return response()->json([
                    'request' => $locked->toApiArray(),
                    'affilie' => $locked->affilie?->toApiArray(),
                    'message' => 'Demande déjà validée.',
                ]);
            }

            $locked->update(['status' => $data['status']]);
            $payload = ['request' => $locked->fresh()->toApiArray()];

            if ($data['status'] === 'validated' && ! $locked->affilie_id) {
                $cin = MouchapCodes::normalizeCin((string) $locked->cin);
                $contact = preg_replace('/\D+/', '', (string) $locked->contact) ?: (string) $locked->contact;

                $affilie = MouchapCodes::findExistingAffilie($cin, $contact);

                if (! $affilie) {
                    $password = MouchapCodes::randomPassword();
                    $login = MouchapCodes::slugLogin($locked->nom_complet);

                    $affilie = Affilie::create([
                        'code' => $locked->code,
                        'date' => now()->toDateString(),
                        'nom_complet' => trim(preg_replace('/\s+/', ' ', (string) $locked->nom_complet)),
                        'titre' => $locked->titre,
                        'cin' => $cin,
                        'contact' => $contact,
                        'ville' => $locked->ville,
                        'banque' => $locked->banque,
                        'rib' => $locked->rib,
                        'type_paiement' => 'Vir',
                        'statue' => 'actif',
                        'login' => $login,
                        'password' => $password,
                        'password_display' => $password,
                    ]);

                    $body = "Bonjour {$affilie->nom_complet},\n\n"
                        ."Votre demande d'affiliation ({$affilie->code}) a été validée.\n"
                        ."Vous pouvez vous connecter à l'espace affilié avec :\n"
                        ."Login : {$affilie->login}\n"
                        ."Mot de passe : {$password}\n\n"
                        .'Bienvenue dans le réseau MOUCHAP.';

                    Message::create([
                        'n_msg' => MouchapCodes::nextMessageCode(),
                        'date' => now()->toDateString(),
                        'affilie_id' => $affilie->id,
                        'type' => 'validation',
                        'title' => "Confirmation d'affiliation",
                        'body' => $body,
                        'reponse' => '',
                    ]);

                    $payload['message'] = "Message de confirmation envoyé à {$affilie->nom_complet}";
                } else {
                    $payload['message'] = "Affilié existant réutilisé ({$affilie->code}).";
                }

                $locked->update(['affilie_id' => $affilie->id]);
                $payload['request'] = $locked->fresh()->toApiArray();
                $payload['affilie'] = $affilie->fresh()->toApiArray();
            }

            return response()->json($payload);
        });
    }
}
