
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"  /> 
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php $__env->stopPush(); ?>
<style>
</style>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper" style="margin-left:255px">
      
      <div class="row g-3 align-items-center mt-1">
        <div class="col-auto mb-2">
          <a href="/pengaduan/tampil" class="btn btn-Info">
            <i class="fas fa-plus-circle" title="Tambah Pengaduan"></i>
          </a> 
        </div>

    </div>
      <div class="row mb-5">
          <table  class="table table-striped" table class="table" id="example"  style="width:100%">
              <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Tanggal Kerusakan</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Aset</th>
                    <th scope="col">Deskripsi Kerusakan</th>
                    <th scope="col">Status</th>
                
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  ?>
                <!-- Isi tabel di sini -->
                    <?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td ><?php echo e($no++); ?></td>
                        <td ><?php echo e($row->user->nama); ?></td>
                        <td ><?php echo e($row->tanggal_pengaduan); ?></td>
                        <td ><?php echo e($row->aset->room->nama_room); ?></td>
                        <td ><?php echo e($row->aset->nama_aset); ?></td>
                        <td ><?php echo e($row->deskripsi_rusak); ?></td>
                        <td>
                            <?php if($row->status == 'Diajukan'): ?>
                            <span class="badge badge-danger"><?php echo e($row->status); ?></span>
                            <?php elseif($row->status == 'Selesai'): ?>
                            <span class="badge badge-success"><?php echo e($row->status); ?></span>
                            <?php else: ?>
                            <span class="badge badge-secondary"><?php echo e($row->status); ?></span>
                            <?php endif; ?>
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
  $(document).ready(function() {
      var table = $('#example').DataTable({
          order: [[2, 'desc']], // Mengatur urutan berdasarkan kolom Tanggal Kerusakan secara descending
          dom: 'lBfrtip', // Menampilkan tombol-tombol export dan pilihan panjang halaman
          lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah data per halaman
          pageLength: 10, // Jumlah data default yang ditampilkan
          columnDefs: [
              { orderable: false, targets: 0 } // Menonaktifkan sorting pada kolom No
          ],
          drawCallback: function(settings) {
              var api = this.api();
              var startIndex = api.context[0]._iDisplayStart;
              api.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                  cell.innerHTML = startIndex + i + 1;
              });
          }
      });
  });
</script>
<script>
  <?php if(Session::has('sukses')): ?>
    toastr.success("<?php echo e(Session::get('sukses')); ?>")
  <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layout.pegawai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/user/pengaduan.blade.php ENDPATH**/ ?>