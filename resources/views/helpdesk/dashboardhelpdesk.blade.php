@extends('layout.layouthelpdesk')

@section('content')

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
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $jumlahPengaduan }}</h3>

              <p>Pengaduan Aset</p>
            </div>
            <div class="icon">
              <i class="fas fa-box-open"></i>
            </div>
            <a href="/helpdesk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

  

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $pengaduanSelesai }}</h3>

              <p>Pengaduan Selesai</p>
            </div>
            <div class="icon">
              <i class="fas fa-check"></i>
            </div>
            <a href="/helpdesk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="card">
              <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                      <h3 class="card-title">Pengaduan Aset</h3>
                  </div>
              </div>
              <div class="card-body">
                  <div class="d-flex">
                      <p class="d-flex flex-column">
                          {{-- <span class="text-bold text-lg" id="total-complaints">{{ $jumlahPengaduan }}</span> --}}
                          <span>Pengaduan Aset Per Bulan</span>
                      </p>
                  </div>
                  <div class="position-relative mb-4">
                      <canvas id="complaints-chart" height="200"></canvas>
                  </div>
              </div>
          </div>
      </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var ctx = document.getElementById('complaints-chart').getContext('2d');
      var dataPengaduan = @json($dataPengaduan);

      var labels = dataPengaduan.map(item => item.bulan);
      var data = dataPengaduan.map(item => item.jumlah);

      var chart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: labels,
              datasets: [{
                  label: 'Jumlah Pengaduan',
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