<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('n_msg')->nullable()->unique()->after('id');
            $table->date('date')->nullable()->after('n_msg');
            $table->text('reponse')->nullable()->after('body');
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn(['n_msg', 'date', 'reponse']);
        });
    }
};
