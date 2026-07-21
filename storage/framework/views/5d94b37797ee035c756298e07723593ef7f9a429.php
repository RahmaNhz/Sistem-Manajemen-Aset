
<?php $__env->startSection('content'); ?>

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
                          <form action="/editkategori/<?php echo e($data->id); ?> "method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <div class="mb-3">
                                <label for="namakategori" class="form-label">Nama Aset</label>
                                <input type="text" name='nama_kategori' class="form-control" id="nama_kategori" aria-describedby="emailHelp" value="<?php echo e($data->nama_kategori); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/user/tampilkategori.blade.php ENDPATH**/ ?>