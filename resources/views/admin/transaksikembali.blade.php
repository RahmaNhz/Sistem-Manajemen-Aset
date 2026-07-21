@extends('layout.admin')
@push('css')
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

.content-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Set minimum height to fill the viewport */
    margin-left:255px;
  }

  .content-header {
    flex: 0 0 auto; /* Keep the header at the top */
  }

  .content {
    flex: 1 0 auto; /* Allow the content area to grow */
    padding: 20px; /* Add some padding */
  }

table{
  border-collapse: separate;
  border-spacing: 0;
  width: 90%;
  border-radius: 6px;
  overflow: hidden;
  background-color: white;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); /* Efek gradasi */
}


.custom-table .stylejudul {
  background: #025B30;
}
.stylejudul th {
  color:black;
  
}






</style>
@endpush
@section('content')
<div class="content-wrapper">

      <div class="row ">
        <table id="example" class="table table-striped" style="width:100%">
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
              {{-- <tbody>
                @if($pengembalian->isEmpty())
               <tr>
                <td colspan="10">Belum Ada Aset Kembali.</td>
              </tr>
               @else --}}
              @php
                  $no = 1;
              @endphp
                  @foreach($pengembalian as $index => $row)
               
                  <td>{{ $no++ }}</td>
                  {{-- <td>{{ $row->aset->id}}</td> --}}
                  <td>{{ $row->peminjaman->aset->nama_aset }}</td>
                  <td>{{ $row->peminjaman->aset->room->nama_room  }}</td>
                  <td>{{ $row->peminjaman->user->nama  }}</td>
                  <td>{{ $row->peminjaman->user->nik }}</td>
                  <td>{{ $row->peminjaman->tanggal_pinjam }}</td>
                  <td>{{ $row->peminjaman->tanggal_kembali}}</td>
                  <td>{{ $row->peminjaman->jumlah_pinjam }}</td>
                  <td>{{ $row->peminjaman->ket_pinjam }}</td>
                  <td>{{ $row->tgl_kembali }}</td>
                </tr>
                @endforeach
              {{-- </tbody> --}}
            </table>
            {{-- @endif --}}
      </div>
  </div>
</div>




{{-- FORM PEMNGEMBALIAN --}}
@endsection


<!-- Skrip JavaScript -->
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js
"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js
"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

{{-- <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

<script>
  new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>

@endpush