<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('affilies', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->date('date')->nullable();
            $table->string('nom_complet');
            $table->string('titre')->nullable();
            $table->string('cin')->nullable();
            $table->string('contact')->nullable();
            $table->string('ville')->nullable();
            $table->string('banque')->nullable();
            $table->string('rib')->nullable();
            $table->string('type_paiement')->default('Vir');
            $table->string('statue')->default('actif');
            $table->string('login')->unique();
            $table->string('password');
            $table->string('password_display')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affilies');
    }
};
