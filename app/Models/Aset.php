<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aset extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $dates=['created_at'];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id','id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'aset_id');
    }

   
}
