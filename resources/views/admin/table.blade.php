<table class="table table-striped" id="example" style="width:100%">
    <thead>
        <tr class="stylejudul">
            <th scope="col">No</th>
            <th scope="col">Nama Aset</th>
            <th scope="col">Ruang</th>
            <th scope="col">Peminjam</th>
            <th scope="col">NIK</th>
            <th scope="col">Tanggal Peminjaman</th>
            <th scope="col">Durasi</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal kembali</th>
        </tr>
    </thead>
    <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($pengembalian as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->peminjaman->aset->nama_aset }}</td>
                    <td>{{ $row->peminjaman->aset->room->nama_room }}</td>
                    <td>{{ $row->peminjaman->user->nama }}</td>
                    <td>{{ $row->peminjaman->user->nik }}</td>
                    <td>{{ $row->peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $row->peminjaman->tanggal_kembali }}</td>
                    <td>{{ $row->peminjaman->jumlah_pinjam }}</td>
                    <td>{{ $row->peminjaman->ket_pinjam }}</td>
                    <td>{{ $row->tgl_kembali }}</td>
                </tr>
            @endforeach
    </tbody>
</table>


