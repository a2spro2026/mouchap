<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('n_cmd')->unique();
            $table->date('date')->nullable();
            $table->foreignId('affilie_id')->nullable()->constrained('affilies')->nullOnDelete();
            $table->string('affilie_nom')->nullable();
            $table->string('ville')->nullable();
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
            $table->string('ref_prod')->nullable();
            $table->string('designation')->nullable();
            $table->string('nom_client')->nullable();
            $table->string('contact')->nullable();
            $table->unsignedInteger('qte')->default(1);
            $table->json('sizes')->nullable();
            $table->json('couleurs')->nullable();
            $table->decimal('prix_u', 12, 2)->default(0);
            $table->decimal('montant', 12, 2)->default(0);
            $table->string('statue')->default('reporte');
            $table->string('stock')->default('dispo');
            $table->string('source')->default('catalogue');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
