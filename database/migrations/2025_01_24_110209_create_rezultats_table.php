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
        Schema::create('rezultats', function (Blueprint $table) {
            $table->id();
            $table->integer('iduser');
            $table->integer('idtest');
            $table->integer('codserie');
            $table->integer('codtest');
            $table->integer('punctaj');
            $table->text('enunt');
            $table->text('raspuns');
            $table->text('raspuns_corect');
            $table->text('calea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rezultats');
    }
};
