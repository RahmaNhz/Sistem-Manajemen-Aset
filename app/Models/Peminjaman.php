<?php

namespace App\Models;

use App\Models\Aset;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
         'ket_pinjam', // Tambahkan 'ket_pinjam' ke dalam fillable property
         'aset_id',  // Ensure all fillable fields are listed
        'pegawai_id',
        'tanggal_pinjam',
        'rencana_kembali',
        'jumlah_pinjam',
        'tanggal_pengembalian'

    ];

    public function aset(){
        return $this->belongsTo(Aset::class,'aset_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'pegawai_id','id');
    }
    
}
