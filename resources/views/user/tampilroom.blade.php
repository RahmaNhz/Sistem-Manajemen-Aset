@extends('layout.admin')
@section('content')

<style>
.container-center {
    width: 80%; /* Sesuaikan lebar container sesuai kebutuhan */
    margin-top: 65px; /* Menambahkan margin 50px di atas */
    margin-bottom: 50px; /* Menambahkan margin 50px di bawah */
    margin-left: auto; /* Margin kiri diatur secara otomatis */
    margin-right: auto; /* Margin kanan diatur secara otomatis */
}

</style>

<body>
      <div class="container container-center">
          <div class="row justify-content-center">
              <div class="col-8">
                  <div class='card'>
                      <div class="card-body">
                          <form action="/editroom/{{ $data->id }} "method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                <label for="namaroom" class="form-label">Nama Ruang</label>
                                <input type="text" name='nama_room' class="form-control" id="nama_room" aria-describedby="emailHelp" value="{{ $data->nama_room }}">
                              </div>
                              
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