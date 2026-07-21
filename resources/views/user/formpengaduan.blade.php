@extends('layout.pegawai')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush
@section('content')
<style>
  .container {
      width: 80%; /* Sesuaikan lebar container sesuai kebutuhan */
      margin-top: 65px; /* Menambahkan margin 50px di atas */
      margin-bottom: 50px; /* Menambahkan margin 50px di bawah */
      margin-left: auto; /* Margin kiri diatur secara otomatis */
      margin-right: auto; /* Margin kanan diatur secara otomatis */
  }
</style>

<body>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-8">
                  <div class='card'>
                      <div class="card-body">
                        <form action="{{ route('insertpengaduan') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                              <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                              <input type="text" class="form-control" id="nama_pelapor" name="pegawai_id" value="{{ $user->nama }}" readonly>
                          </div>

                          <div class="mb-3">
                              <label for="tanggal_pengaduan" class="form-label">Tanggal Kerusakan</label>
                              <input type="date" class="form-control" id="tanggal_pengaduan" name="tanggal_pengaduan" value="{{ $nowtanggal }}" readonly>
                          </div>

                          <div class="mb-3">
                              <label for="room_id" class="form-label">Ruang</label>
                              <select id="room_id" name="room_id" class="form-control" required>
                                  <option value="" selected disabled>Pilih Ruang</option>
                                  @foreach($dataroom as $room)
                                      <option value="{{ $room->id }}">{{ $room->nama_room }}</option>
                                  @endforeach
                              </select>
                          </div>
                          
                          <div class="mb-3">
                              <label for="aset_id" class="from-label">Aset</label>
                              <select id="aset_id" name="aset_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Aset</option>
                                @foreach($dataaset as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_aset }}</option>
                                @endforeach 
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="deskripsi_rusak" class="form-label">Deskripsi Kerusakan</label>
                              <textarea class="form-control" id="deskripsi_rusak" name="deskripsi_rusak" rows="3" required></textarea>
                          </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                 </div>
              </div>
          </div>
      </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection