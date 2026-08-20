<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->date('date')->nullable();
            $table->string('nom');
            $table->string('ville')->nullable();
            $table->string('contact')->nullable();
            $table->string('type_regl')->default('Vir');
            $table->string('banque')->nullable();
            $table->string('ice')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
