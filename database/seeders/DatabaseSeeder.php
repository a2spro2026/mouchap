<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@mouchap.com'],
            [
                'code' => 'USR0001',
                'name' => 'Administrateur MOUCHAP',
                'contact' => '0600000000',
                'statue' => 'gerant',
                'password' => 'admin123',
                'password_display' => 'admin123',
            ]
        );

        User::query()->updateOrCreate(
            ['email' => 'yahya@mouchap.com'],
            [
                'code' => 'USR0002',
                'name' => 'Yahya',
                'contact' => '0661755048',
                'statue' => 'gerant',
                'password' => '0661755048',
                'password_display' => '0661755048',
            ]
        );

        Product::query()->updateOrCreate(
            ['ref' => 'PRD0001'],
            [
                'designation' => 'Robe Élégance',
                'categorie' => 'Robes',
                'famille' => 'Femme',
                'saison' => 'ete',
                'size' => 'S,M,L',
                'qte' => 25,
                'prix' => 299,
                'statue' => 'dispo',
                'etat' => 'actif',
            ]
        );

        Product::query()->updateOrCreate(
            ['ref' => 'PRD0002'],
            [
                'designation' => 'Chemise Urbaine',
                'categorie' => 'Chemises',
                'famille' => 'Homme',
                'saison' => 'hiver',
                'size' => 'M,L,XL',
                'qte' => 12,
                'prix' => 189,
                'statue' => 'dispo',
                'etat' => 'actif',
            ]
        );

        Product::query()->updateOrCreate(
            ['ref' => 'PRD0003'],
            [
                'designation' => 'Veste Printemps',
                'categorie' => 'Vestes',
                'famille' => 'Unisexe',
                'saison' => 'printemps',
                'size' => 'S,M,L,XL',
                'qte' => 4,
                'prix' => 450,
                'statue' => 'faible',
                'etat' => 'actif',
            ]
        );
    }
}
