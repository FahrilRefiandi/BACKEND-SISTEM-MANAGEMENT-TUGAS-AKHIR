<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    use HasFactory;

    protected $table = 'tugas_akhir';
    protected $fillable=[
        'mahasiswa_id',
        'kode_ta',
        'judul_ta',
        'bidang_ta',
        'url_ta',
        'file_ta',
        'proposal_ta',
        'tanggal_upload',
    ];
}
