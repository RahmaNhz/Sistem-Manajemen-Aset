
<?php $__env->startPush('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
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
                        <form action="<?php echo e(route('insertpengaduan')); ?>" method="POST" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                          <div class="mb-3">
                              <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                              <input type="text" class="form-control" id="nama_pelapor" name="pegawai_id" value="<?php echo e($user->nama); ?>" readonly>
                          </div>

                          <div class="mb-3">
                              <label for="tanggal_pengaduan" class="form-label">Tanggal Kerusakan</label>
                              <input type="date" class="form-control" id="tanggal_pengaduan" name="tanggal_pengaduan" value="<?php echo e($nowtanggal); ?>" readonly>
                          </div>

                          <div class="mb-3">
                              <label for="room_id" class="form-label">Ruang</label>
                              <select id="room_id" name="room_id" class="form-control" required>
                                  <option value="" selected disabled>Pilih Ruang</option>
                                  <?php $__currentLoopData = $dataroom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($room->id); ?>"><?php echo e($room->nama_room); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                          </div>
                          
                          <div class="mb-3">
                              <label for="aset_id" class="from-label">Aset</label>
                              <select id="aset_id" name="aset_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Aset</option>
                                <?php $__currentLoopData = $dataaset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_aset); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.pegawai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/user/formpengaduan.blade.php ENDPATH**/ ?>