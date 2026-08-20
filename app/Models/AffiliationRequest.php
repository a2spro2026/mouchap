<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AffiliationRequest extends Model
{
    protected $fillable = [
        'code',
        'nom_complet',
        'titre',
        'cin',
        'contact',
        'ville',
        'rib',
        'banque',
        'status',
        'affilie_id',
    ];

    public function affilie(): BelongsTo
    {
        return $this->belongsTo(Affilie::class);
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->code,
            'uid' => (string) $this->id,
            'nom_complet' => $this->nom_complet,
            'titre' => $this->titre ?? '',
            'cin' => $this->cin ?? '',
            'contact' => $this->contact ?? '',
            'ville' => $this->ville ?? '',
            'rib' => $this->rib ?? '',
            'banque' => $this->banque ?? '',
            'status' => $this->status,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
