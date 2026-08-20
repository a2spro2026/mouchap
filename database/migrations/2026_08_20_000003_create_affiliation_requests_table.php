<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('affiliation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('nom_complet');
            $table->string('titre')->nullable();
            $table->string('cin')->nullable();
            $table->string('contact')->nullable();
            $table->string('ville')->nullable();
            $table->string('rib')->nullable();
            $table->string('banque')->nullable();
            $table->string('status')->default('pending');
            $table->foreignId('affilie_id')->nullable()->constrained('affilies')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affiliation_requests');
    }
};
