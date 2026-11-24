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
    Schema::create('daftar_kerjasamas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_mitra');
        $table->enum('tingkat', ['dalam_negeri', 'luar_negeri'])->default('dalam_negeri');
        $table->string('jenis_dokumen')->nullable(); // MoU, MoA, IA
        $table->string('bidang_kerjasama')->nullable();
        $table->string('tahun_mulai')->nullable();
        $table->string('tahun_berakhir')->nullable();
        $table->string('status')->default('Aktif');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_kerjasamas');
    }
};
