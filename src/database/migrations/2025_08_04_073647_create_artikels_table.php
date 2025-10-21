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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('judul');
            $table->string('penulis');
            $table->text('deskripsi');
            $table->string('slug')->unique();
            $table->enum('kategori', ['Pengendalian Penduduk', 'Keluarga Berencana','Pemberdayaan Perempuan', 'Perlindungan Anak']);
            $table->string('tag')->nullable();
            $table->string('img')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
