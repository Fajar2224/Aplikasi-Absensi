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
        Schema::create('mengajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gurus_id')->references('id')->on('gurus')->onDelete('cascade');
            $table->foreignId('mapels_id')->references('id')->on('mapels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengajars');
    }
};
