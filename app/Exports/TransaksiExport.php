<?php

namespace App\Exports;

use App\Models\pengembalian;
use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $pengembalian = Pengembalian::with('peminjaman.aset', 'peminjaman.aset.room', 'peminjaman.user')->get();
        return view('admin.table',['pengembalian'=>$pengembalian]);
    }
}
