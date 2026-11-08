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
     Schema::create('dosens', function (Blueprint $table) {
    $table->id();
    $table->foreignId('program_studi_id')->constrained()->cascadeOnDelete();
    $table->string('nama_lengkap');
    $table->string('nidn')->unique()->nullable();
    $table->string('jabatan_akademik')->nullable();
    $table->string('foto')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
