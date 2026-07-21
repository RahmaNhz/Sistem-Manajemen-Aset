@extends('layout.admin')
@section('content')
<body>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $totalAsetDipinjam }}</h3>

              <p>Total Aset Dipinjam</p>
            </div>
            <div class="icon">
              <i class="fas fa-cart-arrow-down"></i>
            </div>
            <a href="/transaksipinjam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $AsetDitolak }}</h3>

              <p>Peminjaman Ditolak</p>
            </div>
            <div class="icon">
              <i class="fas fa-times-circle"></i>
            </div>
            <a href="/transaksipinjam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $totalPengembalian }}</h3>

              <p>Total Aset Dikembalikan</p>
            </div>
            <div class="icon">
              <i class="fas fa-undo"></i>
            </div>
            <a href="/transaksipinjam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $totalAset }}</h3>

              <p>Total Aset</p>
            </div>
            <div class="icon">
              <i class="fas fa-cubes"></i>
            </div>
            <a href="/aset" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

          <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Peminjaman Aset</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg" id="total-loans"></span>
                            <span>Peminjaman Aset Per Bulan</span>
                        </p>
                      
                    </div>
                    <!-- /.d-flex -->
                    <div class="position-relative mb-4">
                        <canvas id="loans-chart" height="200"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

</section>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
var ctx = document.getElementById('loans-chart').getContext('2d');
var dataPeminjaman = @json($dataPeminjaman);

var labels = dataPeminjaman.map(item => item.bulan);
var data = dataPeminjaman.map(item => item.jumlah);

var chart = new Chart(ctx, {
type: 'line',
data: {
    labels: labels,
    datasets: [{
        label: 'Jumlah Peminjaman',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        data: data,
        fill: false,
        tension: 0.1
    }]
},
options: {
    maintainAspectRatio: false,
    responsive: true,
    scales: {
        x: {
            title: {
                display: true,
                text: 'Bulan'
            },
            grid: {
                display: false
            }
        },
        y: {
            title: {
                display: true,
                text: 'Jumlah'
            },
            grid: {
                display: true
            },
            beginAtZero: true
        }
    },
    plugins: {
        tooltip: {
            callbacks: {
                label: function(context) {
                    return 'Jumlah: ' + context.raw;
                }
            }
        }
    }
}
});
});
</script>
@endpush