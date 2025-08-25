<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukHukum extends Model
{
    protected $fillable = [
    'jenis_peraturan',
    'judul_peraturan',
    'nomor',
    'tahun_terbit',
    'singkatan_jenis',
    'tahun_penetapan',
    'tanggal_pengundangan',
    'pengarang',
    'sumber',
    'tempat_terbit',
    'bidang_hukum',
    'subjek',
    'bahasa',
    'lokasi',
    'status',
    'lampiran',
    'naskah_akademik'];
}
