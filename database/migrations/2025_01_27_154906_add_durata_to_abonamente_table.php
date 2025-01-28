<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('abonamente', function (Blueprint $table) {
            $table->integer('durata')->after('tva'); // Adds after tva column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abonamente', function (Blueprint $table) {
            //
            $table->dropColumn('durata');
        });
    }
};
