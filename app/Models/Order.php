<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'n_cmd',
        'date',
        'affilie_id',
        'affilie_nom',
        'ville',
        'product_id',
        'ref_prod',
        'designation',
        'nom_client',
        'contact',
        'qte',
        'sizes',
        'couleurs',
        'prix_u',
        'montant',
        'statue',
        'stock',
        'source',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'sizes' => 'array',
            'couleurs' => 'array',
            'qte' => 'integer',
            'prix_u' => 'decimal:2',
            'montant' => 'decimal:2',
        ];
    }

    public function affilie(): BelongsTo
    {
        return $this->belongsTo(Affilie::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function toApiArray(): array
    {
        return [
            'id' => (string) $this->id,
            'date' => optional($this->date)->format('Y-m-d') ?? $this->created_at?->toDateString(),
            'affilie_id' => $this->affilie?->code ?? '',
            'affilie_nom' => $this->affilie_nom ?? '',
            'ville' => $this->ville ?? '',
            'n_cmd' => $this->n_cmd,
            'product_id' => $this->product_id ? (string) $this->product_id : '',
            'ref_prod' => $this->ref_prod ?? '',
            'designation' => $this->designation ?? '',
            'nom_client' => $this->nom_client ?? '',
            'contact' => $this->contact ?? '',
            'qte' => $this->qte,
            'sizes' => $this->sizes ?? [],
            'couleurs' => $this->couleurs ?? [],
            'prix_u' => (float) $this->prix_u,
            'montant' => (float) $this->montant,
            'statue' => $this->statue,
            'stock' => $this->stock,
            'source' => $this->source,
        ];
    }
}
