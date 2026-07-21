@extends('layout.pegawai')
@push('css')
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"  /> 
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endpush
<style>

/* table{
  border-collapse: separate;
  border-spacing: 0;
  width: 90%;
  border-radius: 6px;
  overflow: hidden;
  background-color: black;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); 
} */


table, th, td {
  /* border: 1px solid black;
  padding: 8px; */
  text-align: center;
}
.stylejudul{
  background:#025B30;
  
}
.stylejudul th {
  color:white;
  
}

tbody tr:nth-child(odd) {
    background-color: #f2f2f2; /* Warna latar belakang baris ganjil */
}

tbody tr:nth-child(even) {
    background-color: #ffffff; /* Warna latar belakang baris genap */
}





</style>
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

      <div class="row ">
          <table class="table table-striped" class="table" id="example"  style="width:100%">
              <thead>
                <tr class="stylejudul">
                  <th scope="col">No</th>
                  {{-- <th scope="col">ID ASET</th> --}}
                  <th scope="col">Nama Aset</th>
                  <th scope="col">Ruang</th>
                  <th scope="col">Peminjam</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Tanggal Peminjaman</th>
                  <th scope="col">Rencana Pengembalian</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Tanggal Pengembalian</th>
                  <th scope="col">Status</th>
                  {{-- <th scope="col">Aksi</th> --}}
                </tr>
              </thead>
              <tbody>
              @php
                  $no = 1;
              @endphp
                  @foreach($peminjaman as $index => $row)
                    <td>{{ $no++ }}</td>
                  {{-- <td>{{ $row->aset->id}}</td> --}}
                  <td>{{ $row->aset->nama_aset }}</td>
                  <td>{{ $row->aset->room->nama_room }}</td>
                  <td>{{ $row->user->nama }}</td>
                  <td>{{ $row->user->nik}}</td>
                  <td>{{ $row->tanggal_pinjam}}</td>
                  <td>{{ $row->rencana_kembali}}</td>
                  <td>{{ $row->jumlah_pinjam}}</td>
                  <td>{{ $row->tanggal_pengembalian ??'-'}}</td>
                  <td>{{ $row->ket_pinjam}}</td>
               
                </tr>
                @endforeach

              </tbody>
            </table>
      </div>
  </div>
</div>
@endsection


<!-- Skrip JavaScript -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script>
 $(document).ready(function() {
      var table = $('#example').DataTable({
          order: [[5, 'desc']], // Mengatur urutan berdasarkan kolom Tanggal Kerusakan secara descending
          dom: 'lBfrtip', // Menampilkan tombol-tombol export dan pilihan panjang halaman
          lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah data per halaman
          pageLength: 10, // Jumlah data default yang ditampilkan
          columnDefs: [
              { orderable: false, targets: 0 } // Menonaktifkan sorting pada kolom No
          ],
          drawCallback: function(settings) {
              var api = this.api();
              var startIndex = api.context[0]._iDisplayStart;
              api.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                  cell.innerHTML = startIndex + i + 1;
              });
          }
      });
  });
</script>
</script>
 <script>
  @if(Session::has('sukses'))
    toastr.success("{{ Session::get('sukses') }}")
  @endif
  </script>
@endpush