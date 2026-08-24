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
        'categorie',
        'famille',
        'nom_client',
        'contact',
        'adresse',
        'remarque',
        'qte',
        'sizes',
        'couleurs',
        'prix_u',
        'montant',
        'marge',
        'date_paie',
        'recu',
        'statue',
        'stock',
        'source',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'date_paie' => 'date',
            'sizes' => 'array',
            'couleurs' => 'array',
            'qte' => 'integer',
            'prix_u' => 'decimal:2',
            'montant' => 'decimal:2',
            'marge' => 'decimal:2',
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
        $statue = $this->statue === 'confirme' ? 'livree' : $this->statue;

        return [
            'id' => (string) $this->id,
            'uid' => (string) $this->id,
            'date' => optional($this->date)->format('Y-m-d') ?? $this->created_at?->toDateString(),
            'affilie_id' => $this->affilie?->code ?? '',
            'affilie_nom' => $this->affilie_nom ?? '',
            'ville' => $this->ville ?? '',
            'n_cmd' => $this->n_cmd,
            'product_id' => $this->product_id ? (string) $this->product_id : '',
            'ref_prod' => $this->ref_prod ?? '',
            'designation' => $this->designation ?? '',
            'categorie' => $this->categorie ?? ($this->product?->categorie ?? ''),
            'famille' => $this->famille ?? ($this->product?->famille ?? ''),
            'nom_client' => $this->nom_client ?? '',
            'contact' => $this->contact ?? '',
            'adresse' => $this->adresse ?? '',
            'remarque' => $this->remarque ?? '',
            'qte' => $this->qte,
            'sizes' => $this->sizes ?? [],
            'size' => is_array($this->sizes) && count($this->sizes) ? (string) $this->sizes[0] : ($this->product?->size ?? ''),
            'couleurs' => $this->couleurs ?? [],
            'couleur' => is_array($this->couleurs) && count($this->couleurs) ? (string) $this->couleurs[0] : '',
            'prix_u' => (float) $this->prix_u,
            'montant' => (float) $this->montant,
            'marge' => (float) $this->marge,
            'date_paie' => optional($this->date_paie)->format('Y-m-d'),
            'recu' => $this->recu === 'oui' ? 'oui' : 'non',
            'statue' => $statue,
            'stock' => $this->stock,
            'source' => $this->source,
        ];
    }
}
