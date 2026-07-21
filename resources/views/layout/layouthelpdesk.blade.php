<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMAS | PSDMO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
  .main-header {
    background: linear-gradient(70deg, #025B30, #FFDE5A);
  }
  /* .main-sidebar{
    background: #025B30;
    color: #fff;
  }
.sidebar{
  
  background: #fff;
    color: #fff;
} */
.wrapper {
      display: flex;
      min-height: 100vh;
    }

    .content-wrapper {
      flex-grow: 1;
      background: #f4f6f9;
      padding: 10px;
    }
.main-sidebar{
    background: #025B30;
    color: #fff;
    width: 250px; /* Adjust this to your sidebar width */
    display: flex;
    flex-direction: column;
    height: 100%;
  }
 
  .sidebar {
    display: flex;
    flex-direction: column;
    background: white;
    color: #fff;
    flex-grow: 1; /* Mengisi tinggi penuh */
}
.nav-link p:hover{
  color: #fff;
  color:#000000;
}
/*.nav-link p:hover{
  color:#000000;
}*/
.nav-icon{
  color: #000000;
}
.nav-icon p{
  color: #fff;
}
.brand-text{
  color: #fdfdfd;
}
.img-circle{
  width: 50px; /* Ubah ukuran sesuai kebutuhan */
  height: 50px; /* Ubah ukuran sesuai kebutuhan */
  border-radius: 100%; /* Mengubah gambar menjadi lingkaran */
  object-fit: cover; 
}
.form-control{
  color:#000000;
}
.brand-text {
    color: #fdfdfd;
    font-weight: bold;
    border: none; /* Pastikan tidak ada border bawah */
    text-decoration: none; /* Pastikan tidak ada garis bawah */
    margin: 0; /* Hilangkan margin */
    padding: 0; 
}

.nav-sidebar .nav-item .nav-link:hover, 
.nav-sidebar .nav-item .nav-link:focus, 
.nav-sidebar .nav-item .nav-link.active {
    background-color: #dbf6e6; /* Warna latar belakang hijau muda */
    border-radius: 2 px; /* Membuat sudut kotak agak membulat */
    color: black; /* Warna teks hitam */
}

.user-panel {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 3px; /* Memberikan sedikit padding di sekitar kontainer */
    margin-right: 10px;
}
.user-panel .image {
    width: 80px;
    height: 100px;
    margin-top: 10px;
    margin-bottom: 10px; /* Menambahkan jarak antara gambar dan nama */
}
.user-panel .image img {
    width: 52px; /* Mengatur lebar gambar agar sesuai dengan lebar elemen .image */
    height: auto; /* Mengatur tinggi gambar agar proporsional */
}
.user-panel .info {
    text-align: center;
    color: black;
    /* font-weight: bold; */

}

</style>
@stack('css')
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">



<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="{{ asset('template/dist/img/PGlogo.png') }}" alt="logoPG" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"  style='color:white '></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->

    
    <ul class="navbar-nav ml-auto">

     
      <!-- Messages Dropdown Menu -->
      

      
      <!-- Notifications Dropdown Menu -->
      
      <div class="nav-item dropdown">
        <a href="#" id="notification-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000000; margin-right:5px">
            <i class="fas fa-bell"></i>
            <span id="notification-count" class="badge badge-danger navbar-badge">0</span> <!-- Jumlah notifikasi akan ditampilkan di sini -->
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notification-dropdown" id="notification-list">
          <h3 class="dropdown-header">NOTIFIKASI</h3> <!-- Judul dropdown -->
          <div class="dropdown-divider"></div> <!-- Garis pemisah -->
          <div id="notification-list">
        </div>
            <!-- Daftar notifikasi akan ditampilkan di sini -->
      </div>
    </div> 
   
    
      
      
    </ul>
  </nav>
  
  <!-- /.navbar -->

  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" style="text-decoration: none !important;">
      <img src="{{ asset('template/dist/img/PGlogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <P class="brand-text font-weight-dark">SIMAS</P>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
            @php
                // Ambil nama pengguna yang masuk
                $username = auth()->user()->username;
                // Konstruksi URL Gravatar berdasarkan nama pengguna
                // $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($username))) . "?d=mp&s=30";
            @endphp
            <img src="{{ asset('template/dist/img/pengguna.png') }}" class="img-circle elevation-4" alt="Image">
        </div>
        <div class="info ml-2">
          <span>Selamat Datang </span>
            <span class="d-block" style="font-weight:bold;">{{ auth()->user()->nama }}</span>
        </div>
    </div>
      

      <div class="form-inline" style="margin-top: -22px;">
        <div class="input-group" data-widget="sidebar-search">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
          </div>
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        </div>
      </div>
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          
          <li class="nav-item">
            <a href="/dashboardhelpdesk" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/helpdesk" class="nav-link">
              <i class="nav-icon fas fa-question-circle"></i>
              <P>
                Pengaduan
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                logout
              </p>
            </a>
          </li>
           


          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="/dashboardhelpdesk">SIMAS</a>.</strong>
    PSDMO.
    <!--<div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>-->
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->

<script src="{{ asset('template/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('template/dist/js/pages/dashboard2.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function() {
    function fetchNotifications() {
      $.ajax({
        url: '{{ route('helpdesk.notifications') }}',
        method: 'GET',
        success: function(data) {
          $('#notification-list').html(data.html);
          $('#notification-count').text(data.count);
        }
      });
    }

    // Ambil notifikasi setiap 30 detik
    setInterval(fetchNotifications, 30000);
    fetchNotifications(); // Pengambilan awal
  });
</script>


@stack('scripts')
</body>
</html>
