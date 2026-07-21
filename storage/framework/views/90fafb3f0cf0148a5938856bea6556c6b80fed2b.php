
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"  /> 
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopPush(); ?>
<style>
  .table {
      border-collapse: separate;
      border-spacing: 0;
      width: 90%;
      border-radius: 6px;
      overflow: hidden;
      background-color: black;
      box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); /* Efek gradasi */
  }
</style>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper" style="margin-left:255px">
  <!-- Content Header (Page header) -->
    <div class="row g-3 align-items-center mt-1">
      <div class="col-auto mb-2">
        <a href="/tambahkategori" class="btn btn-Secondary">
          <i class="fas fa-plus-circle" title="Tambah"></i>
        </a> 
      </div>
    
      <div class="row mb-5">
        <?php if(Session::has('warning')): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo e(Session::get('warning')); ?>

        </div>
    `    <?php endif; ?>
              <table  class="table table-striped" table class="table" id="example"  style="width:100%">
              <thead>
                <tr class="stylejudul">
                  <th scope="col">No</th>
                  <th scope="col">Nama Kategori</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $no = 1;
              ?>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($no++); ?></td>
                  <td><?php echo e($row->nama_kategori); ?></td>
                  <td>
                    <a href="/tampilkategori/<?php echo e($row->id); ?>" class="btn btn-warning">
                      <i class="fas fa-edit" title="Edit"></i>
                    </a>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
  new DataTable('#example');
//   new DataTable('#example', {
//     layout: {
//         bottomEnd: {
//             paging: {
//                 boundaryNumbers: false
//             }
//         }
//     }
// });
</script>

<script>
  <?php if(Session::has('sukses')): ?>
    toastr.success("<?php echo e(Session::get('sukses')); ?>")
  <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/kategori.blade.php ENDPATH**/ ?>