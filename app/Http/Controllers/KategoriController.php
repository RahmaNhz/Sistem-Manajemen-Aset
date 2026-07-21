<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function indexkategori(){
          
          $data=Kategori::all();
          return view('kategori',compact('data'));
      
        // $data=Kategori::paginate('10');
        // return view('kategori',compact('data'));
    }

    //TAMBAH KATEGORI
    public function tambahkategori(Request $request){
        return view('tambahkategori');
    }

    public function insertkategori(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'nama_kategori' => 'required',
    ]);
        $data =Kategori::create($request->all());
        return redirect()->route('kategori')->with('sukses','Data Kategori Berhasil ditambahkan');
       
    }

    //EDIT KATEGORI
    public function tampilkategori($id){
        //dd($request->all());
        $data=Kategori::find($id);
        return view('user.tampilkategori', compact('data'));
    }

    public function editkategori(Request $request, $id){
        $data = Kategori::find($id);

        // Periksa apakah data kategori ditemukan
        if (!$data) {
            return redirect()->route('kategori')->with('error', 'Data kategori tidak ditemukan');
        }
    
        // Update data kategori dengan data yang dikirimkan melalui formulir
        $data->nama_kategori = $request->input('nama_kategori');
        $data->save();
        
        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->route('kategori')->with('sukses','Data Aset Berhasil di Update');
    
    }

   
    
        public function welcome()
    {
        return view('welcome');
    }
}
