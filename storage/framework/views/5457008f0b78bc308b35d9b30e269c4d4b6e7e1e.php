
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"  /> 
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopPush(); ?>
<style>

</style>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper"  style="margin-left:255px">
    <!-- Content Header (Page header) -->
      <div class="row ">
        <h4 style="margin-top:10px">Pengaduan</h4>
          <table class="table table-striped" class="table" id="example"  style="width:100%">
              <thead>
                <tr class="stylejudul">
                  <th scope="col">No</th>
                  <th scope="col">Nama Pelapor</th>
                  <th scope="col">Tanggal Kerusakan</th>
                  <th scope="col">Ruang</th>
                  <th scope="col">Aset</th>
                  <th scope="col">Deskripsi Kerusakan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $no = 1;
              ?>
                  <?php $__currentLoopData = $pengaduanProses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                  <tr>
                    <td ><?php echo e($no++); ?></td>
                    <td ><?php echo e($row->user->nama); ?></td>
                    <td ><?php echo e($row->tanggal_pengaduan); ?></td>
                    <td ><?php echo e($row->aset->room->nama_room); ?></td>
                    <td ><?php echo e($row->aset->nama_aset); ?></td>
                    <td ><?php echo e($row->deskripsi_rusak); ?></td>
                    <td>
                      <div class="d-flex align-items-center">
                          
                          <?php if($row->status === 'Diajukan'): ?>
                              <button class="btn btn-sm btn-success ms-2" onclick="showCompletionForm(<?php echo e($row->id); ?>)" title="Tindakan Perbaikan">
                                  <i class="fas fa-check"></i>
                              </button>
                          <?php endif; ?>
                      </div>
                  </td>              
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table><br>
            <br>
            
            
            <div class="col" style="margin-top:20px">
              <h4>Pengaduan Selesai</h4>
              <table class="table table-striped" id="completedTable" style="width:100%">
                <thead>
                  <tr class="stylejudul">
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Tanggal Kerusakan</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Aset</th>
                    <th scope="col">Deskripsi Kerusakan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Perbaikan</th>
                    <th scope="col">Tindakan</th> <!-- Tambah kolom untuk tindakan -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $no = 1;
                  ?>
                  <?php $__currentLoopData = $pengaduanSelesai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->status === 'Selesai'): ?> <!-- Filter pengaduan yang sudah selesai -->
                      <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($row->user->nama); ?></td>
                        <td><?php echo e($row->tanggal_pengaduan); ?></td>
                        <td><?php echo e($row->aset->room->nama_room); ?></td>
                        <td><?php echo e($row->aset->nama_aset); ?></td>
                        <td><?php echo e($row->deskripsi_rusak); ?></td>
                        <td><?php echo e($row->status); ?></td>
                        <td><?php echo e($row->tanggal_selesai); ?></td>
                        <td><?php echo e($row->ket_pengaduan); ?></td> <!-- Menampilkan keterangan penyelesaian -->
                      </tr>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            
            
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 

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
<script>
  // $(document).ready(function() {
  //     $('#example').DataTable();
  //     $('#completedTable').DataTable({
  //         dom: 'Bfrtip',
  //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
  //     });
  // });
    $(document).ready(function() {
        var exampleTable = $('#example').DataTable({
            order: [[2, 'desc']], // Mengatur urutan berdasarkan kolom Tanggal Kerusakan secara descending
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

        var completedTable = $('#completedTable').DataTable({
            order: [[7, 'desc']], // Mengatur urutan berdasarkan kolom Tanggal Perbaikan secara descending
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
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
  
  function showCompletionForm(id) {
      Swal.fire({
          title: 'Tandai Pengaduan Selesai',
          html: `<form id="completionForm${id}" action="<?php echo e(url('updatepengaduan')); ?>/${id}" method="POST">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="tanggal_selesai" value="<?php echo e(now()->toDateString()); ?>">
                  <textarea class="form-control mb-2" name="ket_pengaduan" placeholder="Keterangan penyelesaian"></textarea>
              </form>`,
          showCancelButton: true,
          confirmButtonText: 'Selesai',
          cancelButtonText: 'Batal',
          preConfirm: () => {
              document.getElementById(`completionForm${id}`).submit();
          }
      });
  }
  </script>
  <?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.layouthelpdesk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/helpdesk/helpdesk.blade.php ENDPATH**/ ?>