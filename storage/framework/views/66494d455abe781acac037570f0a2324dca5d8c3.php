

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>

.content-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Set minimum height to fill the viewport */
  }

  .content-header {
    flex: 0 0 auto; /* Keep the header at the top */
  }

  .content {
    flex: 1 0 auto; /* Allow the content area to grow */
    padding: 20px; /* Add some padding */
  }

table {
    border-collapse: collapse;
    width: 90%;
}

  table,
  th,
  td {
    border: 1px solid black;
    text-align: center;
  }

  .stylejudul {
    background: #025B30;
  }

  .stylejudul th {
    color: white;
  }

  .col-auto.mb-2 {
    float: left; /* Menggunakan float */
  }

  .card {
    max-width: 200px; /* Atur lebar maksimum card */
    height: 400px;
    margin-bottom: 10px; /* Berikan margin bawah untuk memisahkan card */
  }

  .card-img-top {
    max-height: 150px; /* Atur tinggi maksimum gambar */
    object-fit: cover; /* Membuat gambar menyesuaikan kotak tanpa merubah aspek rasio */
  }

  .row-cols-1.row-cols-md-5 .col {
    padding: 0;
    margin-top: 5px;
    margin-bottom: 10px; /* Atur margin bawah untuk jarak antar card */
  }
  .pagination {
    text-align: right;
    margin-left:330%; /* Atur margin agar sesuai dengan keinginan */
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <div class="row g-3 align-items-center mt-1">
      <div class="col-auto mb-2" style="margin-left:0px ;margin-right:10px">
        <form action="/pegawai/aset" method="GET" class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
          </div>
          <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-5 g-4">
      <?php $__currentLoopData = $dataaset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="<?php echo e(asset('fotoaset/'.$row->foto)); ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><b><?php echo e($row->nama_aset); ?></b></h5>
            <p class="card-text">Kategori: <?php echo e($row->kategori->nama_kategori); ?></p>
            <p class="card-text">Stock: <?php echo e($row->jumlah_aset); ?></p>
            <p class="card-text">Ruang: <?php echo e($row->room->nama_room); ?></p>
            <a href="/pegawai/tampil/<?php echo e($row->id); ?>" class="btn btn-primary">Pinjam</a>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="d-flex justify-content-center mt-3">
      <?php echo e($dataaset->links()); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.pegawai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/user/daftaraset.blade.php ENDPATH**/ ?>