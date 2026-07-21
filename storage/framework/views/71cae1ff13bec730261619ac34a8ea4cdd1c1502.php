
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"  /> 
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">

<?php $__env->stopPush(); ?>
<style>

/* table{
  border-collapse: separate;
  border-spacing: 0;
  width: 90%;
  border-radius: 6px;
  overflow: hidden;
  background-color: black;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); 
} */


table, th, td {
  /* border: 1px solid black;
  padding: 8px; */
  text-align: center;
}
.stylejudul{
  background:#025B30;
  
}
.stylejudul th {
  color:white;
  
}

tbody tr:nth-child(odd) {
    background-color: #f2f2f2; /* Warna latar belakang baris ganjil */
}

tbody tr:nth-child(even) {
    background-color: #ffffff; /* Warna latar belakang baris genap */
}





</style>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

      <div class="row ">
          <table class="table table-striped" class="table" id="example"  style="width:100%">
              <thead>
                <tr class="stylejudul">
                  <th scope="col">No</th>
                  
                  <th scope="col">Nama Aset</th>
                  <th scope="col">Ruang</th>
                  <th scope="col">Peminjam</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Tanggal Peminjaman</th>
                  <th scope="col">Rencana Pengembalian</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Tanggal Pengembalian</th>
                  <th scope="col">Status</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php
                  $no = 1;
              ?>
                  <?php $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($no++); ?></td>
                  
                  <td><?php echo e($row->aset->nama_aset); ?></td>
                  <td><?php echo e($row->aset->room->nama_room); ?></td>
                  <td><?php echo e($row->user->nama); ?></td>
                  <td><?php echo e($row->user->nik); ?></td>
                  <td><?php echo e($row->tanggal_pinjam); ?></td>
                  <td><?php echo e($row->rencana_kembali); ?></td>
                  <td><?php echo e($row->jumlah_pinjam); ?></td>
                  <td><?php echo e($row->tanggal_pengembalian ??'-'); ?></td>
                  <td><?php echo e($row->ket_pinjam); ?></td>
               
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
            </table>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<!-- Skrip JavaScript -->
<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script>
 $(document).ready(function() {
      var table = $('#example').DataTable({
          order: [[5, 'desc']], // Mengatur urutan berdasarkan kolom Tanggal Kerusakan secara descending
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
</script>
 <script>
  <?php if(Session::has('sukses')): ?>
    toastr.success("<?php echo e(Session::get('sukses')); ?>")
  <?php endif; ?>
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.pegawai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/user/daftarpeminjaman.blade.php ENDPATH**/ ?>