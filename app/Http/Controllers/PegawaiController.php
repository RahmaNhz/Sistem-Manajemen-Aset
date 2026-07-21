<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Peminjaman;
use App\Models\pengembalian;
use App\Models\Pengaduan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{

    public function dashboardpegawai (){
        $pegawaiId = Auth::id();
        $totalAsetDipinjam = Peminjaman::where('pegawai_id', $pegawaiId)
        ->where('ket_pinjam', 'Disetujui')
        ->sum('jumlah_pinjam');
        $totalAsetDikembalikan= Peminjaman::where('pegawai_id', $pegawaiId)
        ->where('ket_pinjam', 'Dikembalikan')
        ->sum('jumlah_pinjam');

        $jumlahPengaduan = Pengaduan::where('pegawai_id', $pegawaiId)
        ->where('status', 'Diajukan')
        ->count();
        $jumlahPengaduanSelesai = Pengaduan::where('pegawai_id', $pegawaiId)
        ->where('status', 'Selesai')
        ->count();
        
         return view('user.dashboardpegawai', compact('totalAsetDipinjam','jumlahPengaduan','jumlahPengaduanSelesai','totalAsetDikembalikan'));
     }


    public function daftaraset(Request $request)
    {
        $query = Aset::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_aset', 'LIKE', '%' . $search . '%')
                  ->orWhereHas('kategori', function($q) use ($search) {
                      $q->where('nama_kategori', 'LIKE', '%' . $search . '%');
                  })
                  ->orWhereHas('room', function($q) use ($search) {
                      $q->where('nama_room', 'LIKE', '%' . $search . '%');
                  });
        }
    
        $dataaset = $query->paginate(10);
    
        return view('user.daftaraset', compact('dataaset'));
    }


}
