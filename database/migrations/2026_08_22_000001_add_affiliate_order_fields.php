<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('adresse')->nullable()->after('contact');
            $table->decimal('marge', 12, 2)->default(0)->after('montant');
            $table->date('date_paie')->nullable()->after('marge');
            $table->string('recu')->default('non')->after('date_paie');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['adresse', 'marge', 'date_paie', 'recu']);
        });
    }
};
