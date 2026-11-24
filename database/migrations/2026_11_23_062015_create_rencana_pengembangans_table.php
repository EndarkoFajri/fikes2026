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
    Schema::create('rencana_pengembangans', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->enum('kategori', ['renstra', 'renop']);
        $table->string('periode')->nullable(); // Contoh: 2025 - 2029
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
        Schema::dropIfExists('rencana_pengembangans');
    }
};
