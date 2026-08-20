<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'ref',
        'designation',
        'categorie',
        'famille',
        'saison',
        'size',
        'qte',
        'prix',
        'media_path',
        'media_type',
        'statue',
        'etat',
    ];

    protected function casts(): array
    {
        return [
            'qte' => 'integer',
            'prix' => 'decimal:2',
        ];
    }
}
