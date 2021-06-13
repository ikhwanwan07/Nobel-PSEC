@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>

    <div class="row">

        <div class="col-xl-6 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">Jumlah Murid</div>
                <h1 class="text-center">30</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body text-center">Rata-Rata Nilai</div>
                <h1 class="text-center">90</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-6 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">Nama Kelas</div>
                <h1 class="text-center">Junior 1</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar mr-1"></i>
                    Post Test
                </div>
                <div class="card-body"><canvas id="test" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>

</div>
@section('script')
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("test");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: {!! json_encode($data) !!},
    datasets: [{
      label: "Nilai Pretest",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: {!! json_encode($data2) !!},
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: true
        },
        ticks: {
          maxTicksLimit: 10
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: true
    }
  }
});

</script>

@endsection
@endsection
