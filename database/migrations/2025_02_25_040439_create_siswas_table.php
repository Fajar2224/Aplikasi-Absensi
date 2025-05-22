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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('NISN');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('username');
            $table->string('password');
            $table->foreignId('lokals_id')->constrained('lokals')->onDelete('cascade');
            $table->foreignId('jurusans_id')->constrained('jurusans')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
