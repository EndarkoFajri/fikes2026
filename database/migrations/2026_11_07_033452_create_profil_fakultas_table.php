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
    Schema::create('profil_fakultas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_dekan');
        $table->string('gelar_dekan')->nullable();
        $table->string('jabatan')->default('Dekan Fakultas Ilmu Kesehatan');
        $table->string('foto_dekan')->nullable();
        $table->string('slogan_badge')->default('Pelayanan & Karakter Unggul');
        $table->text('kutipan_dekan')->nullable(); // Pesan singkat / sambutan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_fakultas');
    }
};
