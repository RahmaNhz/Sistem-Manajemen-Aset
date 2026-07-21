<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Room;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function indexaset(Request $request){
        
       $dataaset=Aset::all();
        return view('admin.aset',compact('dataaset'));
    }
    public function tambahaset(){
        $datakategori=Kategori::all();
        $dataroom=Room::all();
        return view('admin.tambah',compact('datakategori', 'dataroom'));
    }
    public function insertdata(Request $request){
    //dd($request->all());
        $this->validate($request,[
                'nama_aset' => 'required',
                'kategori_id' => 'required',
                'room_id' => 'required',
                'jumlah_aset' => 'required',
                'ket_aset' => 'required',
                'foto'=> 'required',
        ]);

        $dataaset =Aset::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoaset/',$request->file('foto')->getClientOriginalName());
            $dataaset->foto = $request->file('foto')->getClientOriginalName();
            $dataaset->save();
        }
        return redirect()->route('aset')->with('sukses','Data Aset Berhasil ditambahkan');
    }
    
    
    
    public function tampildata($id){
        //dd($request->all());
        $datakategori=Kategori::all();
        $dataroom=Room::all();
        $dataaset =Aset::find($id);
        return view('admin.tampil', compact('dataaset','datakategori', 'dataroom'));
    }
    public function editdata(Request $request, $id){
        //dd($request->all());
        $dataaset =Aset::find($id);
        $dataaset->update($request->all());
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if (file_exists(public_path('fotoaset/' . $dataaset->foto))) {
                unlink(public_path('fotoaset/' . $dataaset->foto));
            }
    
            // Pindahkan foto baru ke direktori fotoaset
            $request->file('foto')->move('fotoaset/', $request->file('foto')->getClientOriginalName());
            // Update nama foto dengan nama baru
            $dataaset->foto = $request->file('foto')->getClientOriginalName();
        }
    
        // Simpan perubahan ke database
        $dataaset->save();
    
        return redirect()->route('aset')->with('sukses','Data Aset Berhasil di Update');


    }
    public function hapus(Request $request, $id){
        $dataaset = Aset::find($id);

        // Periksa apakah aset terkait dengan transaksi peminjaman atau pengembalian
        if ($dataaset->peminjaman()->exists() ) {
            return redirect()->route('aset')->with('error', 'Data Aset tidak dapat dihapus karena terkait dengan transaksi peminjaman.');
        }
    
        $dataaset->delete();
        return redirect()->route('aset')->with('sukses', 'Data Aset Berhasil di Hapus');
    }

   

    public function cobaaset(Request $request){
        //MEMBUAT SEARCH
        if($request-> has('search')){
            $dataaset = Aset::where('nama_aset','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            //HANYA MENAMPILKAN 5 DATA
             $dataaset=Aset::paginate(5);
        }
        //$dataaset=Aset::all();
        return view('cobaaset',compact('dataaset'));
    }
}


