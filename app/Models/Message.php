<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = [
        'n_msg',
        'date',
        'affilie_id',
        'type',
        'title',
        'body',
        'reponse',
        'read',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'read' => 'boolean',
        ];
    }

    public function affilie(): BelongsTo
    {
        return $this->belongsTo(Affilie::class);
    }

    public function toApiArray(): array
    {
        return [
            'id' => (string) $this->id,
            'n_msg' => $this->n_msg ?: ('MSG-'.$this->id),
            'date' => optional($this->date)->format('Y-m-d')
                ?? $this->created_at?->toDateString(),
            'type' => $this->type,
            'affilie_id' => $this->affilie?->code ?? '',
            'affilie_uid' => (string) ($this->affilie_id ?? ''),
            'affilie_nom' => $this->affilie?->nom_complet ?? '',
            'login' => $this->affilie?->login ?? '',
            'title' => $this->title,
            'objet' => $this->title,
            'body' => $this->body,
            'message' => $this->body,
            'reponse' => $this->reponse ?? '',
            'created_at' => $this->created_at?->toISOString(),
            'read' => (bool) $this->read,
        ];
    }
}
