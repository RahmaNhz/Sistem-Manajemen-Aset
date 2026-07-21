<?php

namespace App\Models;

use App\Models\Peminjaman;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $fillable = ['pinjam_id', 'tgl_kembali'];

    Public function peminjaman(){
        return $this->belongsTo(Peminjaman::class,'pinjam_id','id');
    }
}
