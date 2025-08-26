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
        Schema::create('produk_hukum_conts', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->string('img_cont');
            $table->string('img_pdf');
            $table->timestamps();
        });
        Schema::create('produk_hukums', function (Blueprint $table) {
            $table->id();
            $table->string('reg')->nullable();
            $table->string('jenis_peraturan')->nullable();
            $table->string('judul_peraturan')->nullable();
            $table->string('nomor')->nullable();
            $table->year('tahun_terbit')->nullable();
            $table->string('singkatan_jenis')->nullable();
            $table->date('tahun_penetapan')->nullable();
            $table->date('tanggal_pengundangan')->nullable();
            $table->string('pengarang')->nullable();
            $table->string('sumber')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->string('bidang_hukum')->nullable();
            $table->string('subjek')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('lokasi')->nullable();
            $table->enum('status', ['BERLAKU', 'TIDAK BERLAKU'])->default('BERLAKU');
            $table->string('lampiran')->nullable();
            $table->string('naskah_akademik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_hukum_conts');
        Schema::dropIfExists('produk_hukums');
    }
};
