<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    
    
    public function welcome()
    {
        $totalAsetDipinjam = Peminjaman::where('ket_pinjam', 'Disetujui')->sum('jumlah_pinjam');
        // $totalPengembalian = Pengembalian::count();
        $totalAset=Aset::count();
        $AsetDitolak = Peminjaman::where('ket_pinjam', 'Ditolak')->sum('jumlah_pinjam');
        $totalPengembalian  = Peminjaman::where('ket_pinjam', 'Dikembalikan')->sum('jumlah_pinjam');
        $dataPeminjaman = Peminjaman::select(
                DB::raw('MONTH(tanggal_pinjam) as bulan'),
                DB::raw('COUNT(*) as jumlah_pinjam')
            )
            ->groupBy(DB::raw('MONTH(tanggal_pinjam)'))
            ->orderBy(DB::raw('MONTH(tanggal_pinjam)'))
            ->get()
            ->map(function($item) {
                $bulanNama = date('F', mktime(0, 0, 0, $item->bulan, 10)); // Konversi nomor bulan ke nama bulan
                return ['bulan' => $bulanNama, 'jumlah' => $item->jumlah_pinjam];
            });

       

    // Kirim nilai total jumlah aset yang dipinjam ke view
    return view('welcome', ['totalAsetDipinjam' => $totalAsetDipinjam,
        'totalAset' => $totalAset,
        'dataPeminjaman' => $dataPeminjaman, // Kirim data peminjaman ke view
        'AsetDitolak'=>$AsetDitolak,
        'totalPengembalian'=>$totalPengembalian,
        
]);
    }

}
