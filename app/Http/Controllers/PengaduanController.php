<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use App\Models\Room;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function dashboardhelpdesk(){
        $jumlahPengaduan = Pengaduan::where('status', 'Diajukan') ->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        $pengaduanBulanan = Pengaduan::select(
            DB::raw('MONTH(tanggal_pengaduan) as bulan'),
            DB::raw('COUNT(*) as jumlah')
        )
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

        $dataPengaduan = $pengaduanBulanan->map(function($item) {
            return [
                'bulan' => date("F", mktime(0, 0, 0, $item->bulan, 1)),
                'jumlah' => $item->jumlah
            ];
        });

        return view('helpdesk.dashboardhelpdesk', compact('jumlahPengaduan','pengaduanSelesai','dataPengaduan'));
    }
    public function tampilpengaduan(){
            $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang login
            $dataaset = Aset::all();
            $dataroom = Room::all();
            $nowtanggal = date('Y-m-d');
        
            return view('user.formpengaduan', compact('dataaset', 'dataroom', 'user','nowtanggal'));
        }

    public function pengaduan(){
        $user = User::find(auth()->id()); // Misalnya, mengambil data user saat ini dari model User
        $pengaduan = Pengaduan::where('pegawai_id', $user->id)->get();
        return view('user.pengaduan',compact('pengaduan'));
    }
    
    public function insertpengaduan(Request $request){
        Pengaduan::create([
            'pegawai_id' => Auth::id(), // Gunakan ID pengguna yang sedang login
            'tanggal_pengaduan' => $request->tanggal_pengaduan,
            'room_id' => $request->room_id,
            'aset_id' => $request->aset_id,
            'deskripsi_rusak' => $request->deskripsi_rusak,
        ]);
    
        // Redirect atau kembalikan response yang sesuai
        return redirect()->route('pengaduan')->with('success', 'Pengaduan berhasil disimpan.');
    }

    //ADMIN
    public function helpdesk(){
        $pengaduanProses = Pengaduan::where('status', 'Diajukan')->get();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->get();
        // $pengaduan=Pengaduan::all();
        return view('helpdesk.helpdesk',compact('pengaduanProses', 'pengaduanSelesai'));

        //return view('helpdesk.helpdesk');
    }
    
    public function complete(Request $request, $id) {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->ket_pengaduan = $request->ket_pengaduan;
        $pengaduan->tanggal_selesai = $request->tanggal_selesai;
        $pengaduan->status = 'Selesai';
        $pengaduan->save();
    
        return redirect()->back()->with('success', 'Pengaduan telah diselesaikan.');
    }

  
    public function helpdesknotifications() {
        $pengaduanDiajukan = Pengaduan::where('status', 'Diajukan')->get();
        $count = $pengaduanDiajukan->count();

        $html = '';
        foreach ($pengaduanDiajukan as $pengaduan) {
            $html .= '<a href="' . route('helpdesk') . '" class="dropdown-item">';
            $html .= '<i class="fas fa-exclamation-circle mr-2"></i> Pengaduan baru dari ' . $pengaduan->user->nama . ' (' . $pengaduan->aset->nama_aset . ')'. $pengaduan->deskripsi_rusak ;
            $html .= '<span class="float-right text-muted text-sm">' . $pengaduan->created_at->diffForHumans() . '</span>';
            $html .= '</a>';
            $html .= '<div class="dropdown-divider"></div>';
        }

        if ($pengaduanDiajukan->isEmpty()) {
            $html .= '<a href="#" class="dropdown-item">';
            $html .= '<i class="fas fa-check-circle mr-2"></i> Tidak ada pengaduan baru';
            $html .= '</a>';
        }

        return response()->json([
            'count' => $count,
            'html' => $html
        ]);
    }

    public function adminpengaduan() {
        $pengaduanProses = Pengaduan::where('status', 'Diajukan')->get();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->get();
        // $pengaduan=Pengaduan::all();
        return view('admin.adminpengaduan',compact('pengaduanProses', 'pengaduanSelesai'));

    }

}
