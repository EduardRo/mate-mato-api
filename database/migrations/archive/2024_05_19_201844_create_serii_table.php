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
        Schema::create('serii', function (Blueprint $table) {
            $table->id();
            $table->string('codclasa',2);
            $table->string('codmaterie',2);
            $table->string('codserie');
            $table->string('denumireserie');
            $table->smallInteger('ordine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serii');
    }
};
