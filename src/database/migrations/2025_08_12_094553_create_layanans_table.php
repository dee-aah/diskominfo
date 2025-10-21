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

        // Tabel Layanan
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->enum('program', [
                'Pengendalian Penduduk dan Keluarga Berencana',
                'Pemberdayaan Perempuan',
                'Perlindungan Anak',
                'Keluarga Sejahtera dan Pembangunan Keluarga'
            ])->nullable();
            $table->string('nama');
            $table->text('deskripsi_singkat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('slug')->unique();
            $table->string('img')->nullable();
            $table->timestamps();
        });

        // 3. Tabel Detail Layanan
        Schema::create('layanan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade');
            $table->enum('jenis', [
                'Tujuan Layanan',
                'Manfaat Layanan',
                'Jenis Konsultasi',
                'Syarat & Alur Pelayanan',
                'Tempat Layanan',
                'Kontak Layanan'
            ])->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_details');
        Schema::dropIfExists('layanans');
    }
};
