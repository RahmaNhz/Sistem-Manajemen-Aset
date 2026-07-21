<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $guarded = [];
    public function aset(){
        return $this->belongsTo(Aset::class,'aset_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'pegawai_id','id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id','id');
    }

}
