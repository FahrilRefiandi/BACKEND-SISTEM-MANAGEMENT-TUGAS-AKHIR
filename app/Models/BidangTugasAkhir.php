<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangTugasAkhir extends Model
{
    use HasFactory;
    protected $table='bidang_ta';
    protected $fillable = [
        'bidang',
    ];
    
}
