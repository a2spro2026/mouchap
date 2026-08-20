<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();
            $table->string('designation');
            $table->string('categorie')->nullable();
            $table->string('famille')->nullable();
            $table->string('size')->nullable();
            $table->unsignedInteger('qte')->default(0);
            $table->decimal('prix', 12, 2)->default(0);
            $table->string('media_path')->nullable();
            $table->enum('media_type', ['image', 'video'])->default('image');
            $table->string('statue')->default('dispo');
            $table->string('etat')->default('actif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
