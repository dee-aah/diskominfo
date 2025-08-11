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
        Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique(); 
        $table->foreignId('kategori_id')
            ->nullable()
            ->constrained('kategoris')
            ->nullOnDelete();
        $table->text('deskripsi');
        $table->string('penulis')->nullable();
        $table->date('waktu');
        $table->text('tag')->nullable();
        $table->string('gambar')->nullable();
        $table->unsignedBigInteger('view_count')->default(0);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
