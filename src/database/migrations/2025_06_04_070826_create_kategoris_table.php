<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('type', ['Artikel', 'Berita'])->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

    DB::table('kategoris')->insert([
        [
            'nama' => 'Pengendalian Penduduk',
            'type' => 'Artikel',
            'slug' => 'artikelPengendalianPenduduk',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'Keluarga Berencana',
            'type' => 'Artikel',
            'slug' => 'artikelKeluargaBerencana',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'Pemberdayaan Perempuan',
            'type' => 'Artikel',
            'slug' => 'artikelPemberdayaanPerempuan',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'Perlindungan Anak',
            'type' => 'Artikel',
            'slug' => 'artikelPerlindunganAnak',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'Berita Kota Tasikmalaya',
            'type' => 'Berita',
            'slug' => 'beritaKotaTasikmalaya',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'Berita DPPKBP3A',
            'type' => 'Berita',
            'slug' => 'beritaDPPKBP3A',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
