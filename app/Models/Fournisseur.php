<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        'code',
        'date',
        'nom',
        'ville',
        'contact',
        'type_regl',
        'banque',
        'ice',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function toApiArray(): array
    {
        return [
            'uid' => (string) $this->id,
            'id' => $this->code,
            'date' => optional($this->date)->format('Y-m-d') ?? $this->created_at?->toDateString(),
            'nom' => $this->nom,
            'ville' => $this->ville ?? '',
            'contact' => $this->contact ?? '',
            'type_regl' => $this->type_regl ?? 'Vir',
            'banque' => $this->banque ?? '',
            'ice' => $this->ice ?? '',
        ];
    }
}
