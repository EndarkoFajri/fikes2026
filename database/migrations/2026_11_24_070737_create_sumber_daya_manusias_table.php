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
    Schema::create('sumber_daya_manusias', function (Blueprint $table) {
        $table->id();
        $table->string('judul')->default('Data Sumber Daya Manusia FIKES UDS');
        $table->string('keterangan')->nullable(); // Contoh: Tahun Akademik 2025/2026
        $table->string('file_pdf');
        $table->boolean('is_aktif')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_daya_manusias');
    }
};
