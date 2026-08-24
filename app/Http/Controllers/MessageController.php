<?php

namespace App\Http\Controllers;

use App\Models\Affilie;
use App\Models\Message;
use App\Support\MouchapCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        return response()->json(
            Message::query()
                ->where('affilie_id', $affilie->id)
                ->latest()
                ->get()
                ->map(fn (Message $message) => $message->toApiArray())
                ->values()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        $data = $request->validate([
            'date' => ['nullable', 'date'],
            'objet' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $message = Message::create([
            'n_msg' => MouchapCodes::nextMessageCode(),
            'date' => $data['date'] ?? now()->toDateString(),
            'affilie_id' => $affilie->id,
            'type' => 'outbound',
            'title' => $data['objet'],
            'body' => $data['message'],
            'reponse' => '',
            'read' => false,
        ]);

        return response()->json($message->fresh('affilie')->toApiArray(), 201);
    }

    public function markRead(Message $message): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        if ($message->affilie_id !== $affilie->id) {
            return response()->json(['message' => 'Non autorisé.'], 403);
        }

        if ($message->type !== 'outbound') {
            $message->update(['read' => true]);
        }

        return response()->json($message->fresh('affilie')->toApiArray());
    }

    public function markAllRead(): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        Message::query()
            ->where('affilie_id', $affilie->id)
            ->where('type', '!=', 'outbound')
            ->where('read', false)
            ->update(['read' => true]);

        return response()->json(['ok' => true]);
    }

    public function adminIndex(): JsonResponse
    {
        return response()->json(
            Message::query()
                ->with('affilie')
                ->latest()
                ->get()
                ->map(fn (Message $message) => $message->toApiArray())
                ->values()
        );
    }

    public function adminUnreadCount(): JsonResponse
    {
        $count = Message::query()
            ->where('type', 'outbound')
            ->where('read', false)
            ->count();

        return response()->json(['count' => $count]);
    }

    public function adminStore(Request $request): JsonResponse
    {
        $data = $request->validate([
            'date' => ['nullable', 'date'],
            'affilie_uid' => ['required', 'string'],
            'objet' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $affilie = Affilie::query()
            ->where(function ($query) use ($data) {
                $query->where('id', $data['affilie_uid'])
                    ->orWhere('code', $data['affilie_uid']);
            })
            ->first();

        if (! $affilie) {
            return response()->json(['message' => 'Affilié introuvable.'], 422);
        }

        $message = Message::create([
            'n_msg' => MouchapCodes::nextMessageCode(),
            'date' => $data['date'] ?? now()->toDateString(),
            'affilie_id' => $affilie->id,
            'type' => 'admin',
            'title' => $data['objet'],
            'body' => $data['message'],
            'reponse' => '',
            'read' => false,
        ]);

        return response()->json($message->fresh('affilie')->toApiArray(), 201);
    }

    public function adminMarkRead(Message $message): JsonResponse
    {
        if ($message->type === 'outbound') {
            $message->update(['read' => true]);
        }

        return response()->json($message->fresh('affilie')->toApiArray());
    }
}
