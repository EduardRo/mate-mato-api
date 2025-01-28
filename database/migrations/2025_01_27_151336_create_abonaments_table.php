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
        Schema::create('abonamente', function (Blueprint $table) {
            $table->id();
            $table->string('codabonament');
            $table->string('denumireabonament');
            $table->decimal('pret', 4, 2); // 8 total digits, 2 decimals
            $table->decimal('pretfaratva', 4, 2);
            $table->decimal('tva', 4, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonaments');
    }
};
