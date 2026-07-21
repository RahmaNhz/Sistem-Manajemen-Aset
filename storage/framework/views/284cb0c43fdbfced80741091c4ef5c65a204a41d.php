
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
                          <form action="<?php echo e(route('simpanpeminjaman')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                             <?php echo e(session('error')); ?>

                              </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="namaaset" class="form-label">Nama Aset</label>
                                <input type="text" class="form-control" id="namaset" name="aset_id" value="<?php echo e($dataaset->nama_aset); ?>" readonly>
                                <input type="hidden" name="aset_id" value="<?php echo e($dataaset->id); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nama_ruang" class="form-label">Nama Ruang</label>
                                <input type="text" class="form-control" id="nama_ruang" name="room_id" value="<?php echo e($dataaset->room->nama_room); ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                                <input type="text" class="form-control" id="nama_peminjam" name="pegawai_id" value="<?php echo e($user->nama); ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="nik_peminjam" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik_peminjam" name="nik_peminjam" value="<?php echo e($user->nik); ?>"readonly >
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                            </div>

                            <div class="mb-3">
                                <label for="rencana_kembali" class="form-label">Rencana Pengembalian</label>
                                <input type="date" class="form-control" id="rencana_kembali" name="rencana_kembali" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_pinjam" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                 </div>
              </div>
          </div>
      </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.pegawai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/user/peminjaman.blade.php ENDPATH**/ ?>