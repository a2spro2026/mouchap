<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = [
        'affilie_id',
        'type',
        'title',
        'body',
        'read',
    ];

    protected function casts(): array
    {
        return [
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
            'type' => $this->type,
            'affilie_id' => $this->affilie?->code ?? '',
            'login' => $this->affilie?->login ?? '',
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created_at?->toISOString(),
            'read' => $this->read,
        ];
    }
}
