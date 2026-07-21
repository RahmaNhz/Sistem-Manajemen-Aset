
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
                          <form action="/editdata/<?php echo e($dataaset->id); ?> "method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <div class="mb-3">
                                <label for="namaaset" class="form-label">Nama Aset</label>
                                <input type="text" name='nama_aset' class="form-control" id="namaset" aria-describedby="emailHelp" value="<?php echo e($dataaset->nama_aset); ?>">
                              </div>
                              <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select name="kategori_id" class="form-control" id="kategori_id">
                                    <?php $__currentLoopData = $datakategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kategori->id); ?>" <?php if($kategori->id == $dataaset->kategori_id): ?> selected <?php endif; ?>><?php echo e($kategori->nama_kategori); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                              
                                <div class="mb-3">
                                  <label for="jumlah_aset" class="form-label">Jumlah</label>
                                  <input type="number" name='jumlah_aset' class="form-control" id="jumlah_aset" aria-describedby="emailHelp"value="<?php echo e($dataaset->jumlah_aset); ?>">
                                </div>

                                <div class="mb-3">
                                  <label for="room_id" class="form-label"> Ruang</label>
                                  <select name="room_id" class="form-control" id="room_id">
                                      <?php $__currentLoopData = $dataroom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($room->id); ?>" <?php if($room->id == $dataaset->room_id): ?> selected <?php endif; ?>><?php echo e($room->nama_room); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>



                                <div class="mb-3">
                                  <label for="ket" class="form-label">Keterangan</label>
                                  <input type="text" name='ket_aset'class="form-control" id="ket" aria-describedby="emailHelp"value="<?php echo e($dataaset->ket_aset); ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="foto" class="form-label">Foto</label>
                                  <input type="text" readonly class="form-control" id="foto" name="foto" value="<?php echo e($dataaset->foto); ?>">
                                  <input type="file" class="form-control" id="foto" name="foto" alue="<?php echo e($dataaset->foto); ?>">
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
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/admin/tampil.blade.php ENDPATH**/ ?>