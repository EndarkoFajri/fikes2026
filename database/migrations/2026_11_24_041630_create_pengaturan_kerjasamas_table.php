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
    Schema::create('pengaturan_kerjasamas', function (Blueprint $table) {
        $table->id();
        $table->string('judul_pedoman')->default('Pedoman Kerja Sama FIKES UDS');
        $table->string('file_pedoman_pdf')->nullable();
        $table->string('judul_form_ia')->default('Formulir Upload Implementation Arrangement (IA)');
        $table->text('link_embed_ia')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_kerjasamas');
    }
};
