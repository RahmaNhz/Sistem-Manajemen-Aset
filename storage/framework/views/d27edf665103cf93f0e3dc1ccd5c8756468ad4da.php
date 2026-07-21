
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"  /> 
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopPush(); ?>
<style>
.content-wrapper{
  background-color: white;
  
}
table{
  border-collapse: separate;
  border-spacing: 0;
  width: 90%;
  border-radius: 6px;
  overflow: hidden;
  background-color: black;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); /* Efek gradasi */
}


table, th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}
.custom-table .stylejudul {
  background: #025B30;
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
.img{
  text-align: center;
}
</style>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    
    <div class="row g-3 align-items-center mt-1">
    <div class="col-auto mb-2" style="">
      <a href="/tambahaset" class="btn btn-Secondary" title="Tambah">
        <i class="fas fa-plus-circle"></i>
      </a> 
    </div>
  </div> 



      <div class="row">
          <table class="table table-striped" id="example"  style="width:100%"  >
              <thead>
                <tr class="stylejudul">
                  <th scope="col">No</th>
                  <th scope="col">Gambar Aset</th>
                  <th scope="col">Nama Aset</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Jumlah Aset</th>
                  <th scope="col">Ruang</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $no = 1;
              ?>
                  <?php $__currentLoopData = $dataaset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                   <td><?php echo e($no++); ?></td>
                  <td>
                      <img src="<?php echo e(asset('fotoaset/'.$row->foto)); ?>" alt="" style="width: 45px;">
                  </td>
                  <td><?php echo e($row->nama_aset); ?></td>
                  <td><?php echo e($row->kategori->nama_kategori); ?></td>
                  <td><?php echo e($row->jumlah_aset); ?></td>
                  <td><?php echo e($row->room->nama_room); ?></td>
                  <td><?php echo e($row->ket_aset); ?></td>
                  <td>
                      <a href="/tampildata/<?php echo e($row->id); ?>" class="btn btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger delete" data-id="<?php echo e($row->id); ?>" data-nama="<?php echo e($row->nama_aset); ?>" title="Hapus">
                        <i class="fas fa-trash-alt"></i>
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
</script>

<script>
    $('.delete').click(function(){
      var asetid= $(this).attr('data-id');
      var nama= $(this).attr('data-nama');
      swal({
      title: "Yakin?",
      text: "Anda akan menghapus data aset"+" "+nama+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location ="/hapus/"+asetid+""
        swal("Data Berhasil di hapus", {
          icon: "success",
        });
      } else {
        swal("Data Batal dihapus");
      }
    });
  });
</script>

<script>
  <?php if(session('error')): ?>
    swal("Error", "<?php echo e(session('error')); ?>", "error");
  <?php endif; ?>
</script>


  <script>
    <?php if(Session::has('sukses')): ?>
      toastr.success("<?php echo e(Session::get('sukses')); ?>")
    <?php endif; ?>
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\codemagang\projectaset\resources\views/admin/aset.blade.php ENDPATH**/ ?>