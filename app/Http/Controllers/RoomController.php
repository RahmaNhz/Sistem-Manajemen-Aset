<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function indexroom(){
        // $data=Room::paginate('10');
        $data=Room::all();
        return view('room',compact('data'));
    }

    public function tambahroom(Request $request){
        return view('tambahroom');
    }

    public function insertroom(Request $request){
        $this->validate($request,[
            'nama_room' => 'required',
    ]);
        //dd($request->all());
        $data =Room::create($request->all());
        return redirect()->route('room')->with('sukses','Data Ruang Berhasil ditambahkan');
      
       
    }
    //EDIT ROOM

    public function tampilroom($id){
        //dd($request->all());
        $data=Room::find($id);
        return view('user.tampilroom', compact('data'));
    }

    public function editroom(Request $request, $id){
        // Menemukan dan memperbarui data ruangan yang ingin diedit
        $room = Room::findOrFail($id);
        $room->nama_room = $request->nama_room;
        $room->save();
        
        // Mengarahkan pengguna kembali ke halaman ruangan setelah berhasil menyimpan perubahan
        return redirect('room')->with('sukses', 'Data Ruangan Berhasil di Update');
     
    }
}
