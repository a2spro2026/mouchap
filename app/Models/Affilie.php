<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Affilie extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'code',
        'date',
        'nom_complet',
        'titre',
        'cin',
        'contact',
        'ville',
        'banque',
        'rib',
        'type_paiement',
        'statue',
        'login',
        'password',
        'password_display',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'password' => 'hashed',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->code,
            'uid' => (string) $this->id,
            'date' => optional($this->date)->format('Y-m-d') ?? $this->created_at?->toISOString(),
            'nom_complet' => $this->nom_complet,
            'titre' => $this->titre ?? '',
            'cin' => $this->cin ?? '',
            'contact' => $this->contact ?? '',
            'ville' => $this->ville ?? '',
            'banque' => $this->banque ?? '',
            'rib' => $this->rib ?? '',
            'type_paiement' => $this->type_paiement ?? 'Vir',
            'statue' => $this->statue ?? 'actif',
            'login' => $this->login,
            'password' => $this->password_display ?? '',
        ];
    }
}
