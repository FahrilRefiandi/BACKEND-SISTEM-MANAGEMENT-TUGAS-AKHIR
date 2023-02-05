<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'user_id',
        'dosen_pembina_id',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'no_tlpn',
        'prodi',
        'tahun_masuk',
    ];
}
