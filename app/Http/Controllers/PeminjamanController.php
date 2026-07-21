<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    //------ USER--------
        
        public function daftaraset(Request $request){
            //MEMBUAT SEARCH
            if($request-> has('search')){
                $dataaset = Aset::where('nama_aset','LIKE','%'.$request->search.'%')->paginate(4);
            }else{
                //HANYA MENAMPILKAN 5 DATA
                 $dataaset=Aset::paginate(4);
            }
            //$dataaset=Aset::all();
            dd($dataaset);
            return view('user.daftaraset',compact('dataaset'));
        }



    public function tampilpeminjaman($id){

        $dataaset = Aset::with('room')->find($id); // Mengambil data aset berdasarkan ID dengan informasi ruangnya
        $user = Auth::user();

        return view('user.peminjaman', compact('dataaset','user'));

        // $peminjaman=Peminjaman::all();
        // $dataaset= Aset::all();
        // return view('user.peminjaman',compact('peminjaman', 'dataaset'));
    }
      

    public function simpanpeminjaman(Request $request)
    {
    

    $peminjaman = new Peminjaman();


    // Cari aset yang dipinjam
    $aset = Aset::findOrFail($request->aset_id);

    // Periksa apakah jumlah barang yang diminta untuk dipinjam lebih besar dari yang tersedia
    if ($request->jumlah_pinjam > $aset->jumlah_aset) {
        return redirect()->back()->with('error', 'Jumlah barang yang diminta melebihi stok yang tersedia.');
    }
    
    // Atur nilai atribut dari request
    $peminjaman->aset_id = $request->aset_id;
    $peminjaman->pegawai_id = Auth::id();
    $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
    $peminjaman->rencana_kembali = $request->rencana_kembali;
    $peminjaman->jumlah_pinjam= $request->jumlah_pinjam;
    
    // Simpan data peminjaman ke dalam database
    $peminjaman->save();
    $peminjaman = Peminjaman::orderBy('tanggal_pinjam', 'desc')->get();

     // Kurangi jumlah barang yang tersedia di daftar aset
    $aset->jumlah_aset -= $request->jumlah_pinjam;
    $aset->save();

    // Setelah menyimpan peminjaman, tambahkan notifikasi
    Session::put('new-peminjaman', 'Ada peminjaman baru');
     return redirect()->route('daftarpinjam')->with('success', 'Data peminjaman berhasil disimpan.');
    }

    
    public function daftarpinjam(Request $request){
        
        $pegawaiId = Auth::id();
        $peminjaman = Peminjaman::where('pegawai_id', $pegawaiId)->get();
        return view('user.daftarpeminjaman', compact('peminjaman'));

    }





    //-----ADMIN-----
    
    public function transaksipinjam(Request $request){
            

      
        $peminjaman = Peminjaman::orderBy('tanggal_pinjam', 'desc')->get();
        #dd($peminjaman);
        // $peminjaman = Peminjaman::orderByAsc('tanggal_pinjam')->get();
       
        
    
        return view('admin.transaksipinjam',compact('peminjaman'));
    }


    public function updateStatus(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        
        // Memperbarui status peminjaman
        $peminjaman->update(['ket_pinjam' => $request->status]);

        // Jika status diubah menjadi Disetujui, maka tambahkan timestamp disetujui
        if ($request->status == 'Disetujui') {
            $peminjaman->update(['tgl_disetujui' => now()]);
        }

        // Jika status diubah menjadi Ditolak
        if ($request->status == 'Ditolak') {
            // Kembalikan jumlah aset yang dipinjam ke jumlah aset yang tersedia di tabel aset
            $aset = Aset::findOrFail($peminjaman->aset_id);
            $aset->jumlah_aset += $peminjaman->jumlah_pinjam;
            $aset->save();
        }

        if ($request->status == 'Dikembalikan') {
            $peminjaman->update(['tanggal_pengembalian' => now()->toDateString()]);
        }

        // Redirect kembali ke halaman sebelumnya
        return back()->with('success', 'Status peminjaman berhasil diperbarui.');


    }
    
    public function kembalikanPeminjaman($id)
    {
    $peminjaman = Peminjaman::findOrFail($id);
    $aset = Aset::findOrFail($peminjaman->aset_id);
    
    // Update tanggal_pengembalian to current date
    $peminjaman->tanggal_pengembalian = now()->toDateString();
    $peminjaman->ket_pinjam = 'Dikembalikan';
    $aset->jumlah_aset += $peminjaman->jumlah_pinjam;
    $peminjaman->save();
    $aset->save();

    return back()->with('success', 'Peminjaman berhasil dikembalikan.');
    }

   // app/Http/Controllers/PeminjamanController.php

   public function notifikasipinjam()
{
   

    $peminjamanDiajukan = Peminjaman::with('aset')->where('ket_pinjam', 'Menunggu Approval')->get();
    $count = $peminjamanDiajukan->count();

    $html = '';
    foreach ($peminjamanDiajukan as $peminjaman) {
        $html .= '<a href="' . route('transaksipinjam') . '" class="dropdown-item">';
        // $html .= '<a href="' . route('admin.transaksipinjam', $peminjaman->id) . '" class="dropdown-item notification-item" data-url="' . route('show.transaksipinjam', $peminjaman->id) . '">';
        $html .= '<i class="fas fa-exclamation-circle mr-2"></i> Peminjaman dari ' . $peminjaman->user->nama . ' aset ' . $peminjaman->aset->nama_aset .' Menunggu Disetujui ' ;
        $html .= '<span class="float-right text-muted text-sm">' . $peminjaman->created_at->diffForHumans() . '</span>';
        $html .= '</a>';
        $html .= '<div class="dropdown-divider"></div>';
    }

    if ($peminjamanDiajukan->isEmpty()) {
        $html .= '<a href="#" class="dropdown-item">';
        $html .= '<i class="fas fa-check-circle mr-2"></i> Tidak ada peminjaman baru';
        $html .= '</a>';
    }

    // Ambil data aset yang sesuai dengan peminjaman
    $aset = $peminjamanDiajukan->pluck('aset')->flatten()->unique();

    return response()->json([
        'count' => $count,
        'html' => $html,
        'aset' => $aset // Kirim d
    ]);

}
    


public function show($id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // $peminjaman = Peminjaman::with('aset.room', 'user')->findOrFail($id);
    return view('admin.transaksipinjam', compact('peminjaman'));

}




//TAMPILAN DASHBOARD
public function grafikPeminjaman()
{
    $dataPeminjaman = Peminjaman::select(DB::raw("DATE_FORMAT(tanggal_pinjam, '%Y-%m') as bulan"), DB::raw("COUNT(*) as jumlah"))
        ->groupBy('bulan')
        ->orderBy('bulan', 'asc')
        ->get();

    return view('welcome', compact('dataPeminjaman'));
}

}

