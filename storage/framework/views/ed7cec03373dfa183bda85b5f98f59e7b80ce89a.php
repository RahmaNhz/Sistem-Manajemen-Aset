
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css" crossorigin="anonymous" referrerpolicy="no-referrer" />



<style>

  .content-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Set minimum height to fill the viewport */
      margin-left:255px;
    }
  
    .content-header {
      flex: 0 0 auto; /* Keep the header at the top */
    }
  
    .content {
      flex: 1 0 auto; /* Allow the content area to grow */
      padding: 20px; /* Add some padding */
    }
  
  table{
    border-collapse: separate;
    border-spacing: 0;
    width: 90%;
    border-radius: 6px;
    overflow: hidden;
    background-color: white;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); /* Efek gradasi */
  }
  
  
  .custom-table .stylejudul {
    background: #025B30;
  }
  .stylejudul th {
    color:black;
    
  }
  
  </style>
  <?php $__env->stopPush(); ?>




</style>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper"  style="margin-left:255px">
    <!-- Content Header (Page header) -->

      <div class="row ">
          <table class="table table-striped" class="table" id="example"  style="width:100%">
              <thead>
                <tr class="stylejudul">
                  
                  
                  <th scope="col">Nama Aset</th>
                  <th scope="col">Ruang</th>
                  <th scope="col">Peminjam</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Tanggal Peminjaman</th>
                  <th scope="col">Rencana Pengembalian</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Tanggal Kembali</th>
                  <th scope="col">Status</th>  
                </tr>
              </thead>
              <tbody>
              
                  <?php $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(isset($row->ket_pinjam)): ?>
                  
                
                  
                  
                  
                  <td><?php echo e($row->aset->nama_aset ?? ''); ?></td>
                  <td><?php echo e($row->aset->room->nama_room ?? ''); ?></td>
                  <td><?php echo e($row->user->nama ?? ''); ?></td>
                  <td><?php echo e($row->user->nik ?? ''); ?></td>
                  <td><?php echo e($row->tanggal_pinjam ?? ''); ?></td>
                  <td><?php echo e($row->rencana_kembali ?? ''); ?></td>
                  <td><?php echo e($row->jumlah_pinjam ?? ''); ?></td>
                  <td><?php echo e($row->tanggal_pengembalian ?? '-'); ?></td>
                </td>
                <td>
                  <?php if($row->ket_pinjam == 'Menunggu Approval'): ?>
                  <div class="d-flex align-items-center">
                      <span class="badge bg-warning text-dark d-flex align-items-center">
                          Menunggu Approval
                          <div class="btn-group ms-2">
                              <form action="<?php echo e(route('admin.updateStatus', $row->id)); ?>" method="POST">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <input type="hidden" name="status" value="Disetujui">
                                  <button type="submit" class="btn btn-success btn-sm ms-1">
                                      <i class="fas fa-check" title="Setujui"></i>
                                  </button>
                              </form>
                              <form action="<?php echo e(route('admin.updateStatus', $row->id)); ?>" method="POST">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('PUT'); ?>
                                  <input type="hidden" name="status" value="Ditolak">
                                  <button type="submit" class="btn btn-danger btn-sm ms-1">
                                      <i class="fas fa-times" title="Tolak"></i>
                                  </button>
                              </form>
                          </div>
                      </span>
                  </div>
                  <?php elseif($row->ket_pinjam == 'Disetujui'): ?>
                  <form action="<?php echo e(route('kembalikanPeminjaman', $row->id)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <button type="submit" class="btn btn-warning">Kembalikan</button>
                  </form>
                  <?php else: ?>
                  <?php echo e($row->ket_pinjam ?? ''); ?>

                  <?php endif; ?>
              </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
            
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js
"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js
"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>




<script>
  $(document).ready(function() {
      $('#example').DataTable({
          order: [[4, 'desc']], // Mengatur urutan berdasarkan kolom Tanggal Peminjaman secara descending
          dom: 'lBfrtip', // Menampilkan tombol-tombol export dan pilihan panjang halaman
          lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah data per halaman
          pageLength: 10, // Jumlah data default yang ditampilkan
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });
  });
</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/admin/transaksipinjam.blade.php ENDPATH**/ ?>