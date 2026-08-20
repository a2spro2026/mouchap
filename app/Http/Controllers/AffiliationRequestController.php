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
            $affiliationRequest->update(['status' => $data['status']]);

            $payload = ['request' => $affiliationRequest->fresh()->toApiArray()];

            if ($data['status'] === 'validated' && ! $affiliationRequest->affilie_id) {
                $password = MouchapCodes::randomPassword();
                $login = MouchapCodes::slugLogin($affiliationRequest->nom_complet);

                $affilie = Affilie::create([
                    'code' => $affiliationRequest->code,
                    'date' => now()->toDateString(),
                    'nom_complet' => $affiliationRequest->nom_complet,
                    'titre' => $affiliationRequest->titre,
                    'cin' => $affiliationRequest->cin,
                    'contact' => $affiliationRequest->contact,
                    'ville' => $affiliationRequest->ville,
                    'banque' => $affiliationRequest->banque,
                    'rib' => $affiliationRequest->rib,
                    'type_paiement' => 'Vir',
                    'statue' => 'actif',
                    'login' => $login,
                    'password' => $password,
                    'password_display' => $password,
                ]);

                $affiliationRequest->update(['affilie_id' => $affilie->id]);

                $body = "Bonjour {$affilie->nom_complet},\n\n"
                    ."Votre demande d'affiliation ({$affilie->code}) a été validée.\n"
                    ."Vous pouvez vous connecter à l'espace affilié avec :\n"
                    ."Login : {$affilie->login}\n"
                    ."Mot de passe : {$password}\n\n"
                    .'Bienvenue dans le réseau MOUCHAP.';

                Message::create([
                    'affilie_id' => $affilie->id,
                    'type' => 'validation',
                    'title' => "Confirmation d'affiliation",
                    'body' => $body,
                ]);

                $payload['affilie'] = $affilie->toApiArray();
                $payload['message'] = "Message de confirmation envoyé à {$affilie->nom_complet}";
            }

            return response()->json($payload);
        });
    }
}
