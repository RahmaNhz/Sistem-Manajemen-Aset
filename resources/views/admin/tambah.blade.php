@extends('layout.admin')
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
                          <form action="/insertdata" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                <label for="namaaset" class="form-label">Nama Aset</label>
                                <input type="text" name='nama_aset' class="form-control" id="namaset" aria-describedby="emailHelp">
                                  @error('nama_aset')
                                    <div class="alert alert-danger">Nama aset wajib diisi</div>
                                   @enderror
                              </div>

                              <div class="mb-3">
                                <label for="kategori_id" class="from-label">Kategori</label>
                                <select id="kategori_id" name="kategori_id" class="form-control">
                                  <option value="" selected disabled>Pilih Kategori</option>
                                  @foreach($datakategori as $data)
                                      <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                  @endforeach

                                    @error('kategori_id')
                                      <div class="alert alert-danger">Pilih Kategori Aset</div>
                                    @enderror
                              </select>
                              </div>
                                
                              {{-- <div class="mb-3">
                                  <label for="kategori" class="form-label">Kategori</label>
                                  <input type="text" name='kategori' class="form-control" id="kategori" aria-describedby="emailHelp">
                                </div> --}}
                                <div class="mb-3">
                                  <label for="jumlah_aset" class="form-label">Jumlah Aset</label>
                                  <input type="number" name='jumlah_aset' id="jumlah_aset" aria-describedby="emailHelp" class="form-control">
                                    @error('jumlah_aset')
                                    <div class="alert alert-danger">Jumlah Aset Wajib diisi</div>
                                  @enderror
                                </div>

                                <div class="mb-3">
                                  <label for="room_id" class="from-label">Ruang</label>
                                  <select id="room_id" name="room_id" class="form-control">
                                    <option value="" selected disabled>Pilih Ruang</option>
                                    @foreach($dataroom as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_room }}</option>
                                    @endforeach
                                      @error('room_id')
                                        <div class="alert alert-danger">Pilih Ruang</div>
                                      @enderror
                                </select>
                                </div>


                                <div class="mb-3">
                                  <label for="ket" class="form-label">Keterangan</label>
                                  <input type="text" name='ket_aset'class="form-control" id="ket" aria-describedby="emailHelp">
                                    @error('ket_aset')
                                    <div class="alert alert-danger">Keterangan aset wajib diisi</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="foto" class="form-label">Masukkan Foto</label>
                                  <input type="file" name='foto'class="form-control" >
                                    @error('foto')
                                    <div class="alert alert-danger">Foto aset wajib diisi</div>
                                    @enderror
                                  <br>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection