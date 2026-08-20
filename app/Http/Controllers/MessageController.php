<?php

namespace App\Http\Controllers;

use App\Models\Message;
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

    public function markRead(Message $message): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        if ($message->affilie_id !== $affilie->id) {
            return response()->json(['message' => 'Non autorisé.'], 403);
        }

        $message->update(['read' => true]);

        return response()->json($message->fresh()->toApiArray());
    }

    public function markAllRead(): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        Message::query()
            ->where('affilie_id', $affilie->id)
            ->where('read', false)
            ->update(['read' => true]);

        return response()->json(['ok' => true]);
    }
}
