@extends('layout.pegawai')
@push('css')
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"  /> 
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endpush
@section('content')
<div class="content-wrapper">
  

      <div class="row ">
        <table class="table table-striped" class="table" id="example"  style="width:100%">
              <thead>
                <tr class="stylejudul">
                  <th scope="col">No</th>
                  <th scope="col">Nama Aset</th>
                  <th scope="col">Ruang</th>
                  <th scope="col">Peminjam</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Tanggal Peminjaman</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Status</th>
                  <th scope="col">Tanggal kembali</th>
                </tr>
              </thead>
              @php
                  $no = 1;
              @endphp
                  @foreach($pengembalian as $index => $row)
                  <td>{{ $no++ }}</td>
                  <td>{{ $row->peminjaman->aset->nama_aset }}</td>
                  <td>{{ $row->peminjaman->aset->room->nama_room }}</td>
                  <td>{{ $row->peminjaman->user->nama }}</td>
                  <td>{{ $row->peminjaman->user->nik }}</td>
                  <td>{{ $row->peminjaman->tanggal_pinjam }}</td>
                  <td>{{ $row->peminjaman->jumlah_pinjam}}</td>
                  <td>{{ $row->peminjaman->ket_pinjam}}</td>
                  <td>{{ $row->tgl_kembali}}</td>
                </tr>
                @endforeach
            </table>
      </div>
  </div>
</div>




{{-- FORM PEMNGEMBALIAN --}}
@endsection


<!-- Skrip JavaScript -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
</body>
<script>  
new DataTable('#example', {
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        }
    }
});
</script>

<script>
  @if(Session::has('sukses'))
    toastr.success("{{ Session::get('sukses') }}")
  @endif
</script>
@endpush

