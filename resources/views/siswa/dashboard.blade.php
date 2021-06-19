@extends('layouts.master')
@section('content')
<style>
    .member{
        height: 300px;
        width: 50%;
    }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="col-xl-6 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body text-center">Rata Rata Nilai</div>
            <h1 class="text-center">80</h1>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
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
        {{-- <div class="col-xl-6 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">Nama Kelas</div>
                <h1 class="text-center">{{Auth::user()->siswa->kelas}}</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
    <h3 class="mt-4">Chat Pretest Posttest</h3>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    Post Test
                </div>
                <div class="card-body"><canvas id="posttest" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar mr-1"></i>
                    Pre Test
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

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Area Chart Example
var ctx = document.getElementById("posttest");
var myLineChart = new Chart(ctx, {
    type: "line",
    data: {
        labels:{!! json_encode($data3) !!} ,
        datasets: [
            {
                label: "Sessions",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: {!! json_encode($data4) !!}
            }
        ]
    },
    options: {
        scales: {
            xAxes: [
                {
                    time: {
                        unit: "date"
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 4
                    }
                }
            ],
            yAxes: [
                {
                    ticks: {
                        min: 0,
                        max: 100,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)"
                    }
                }
            ]
        },
        legend: {
            display: false
        }
    }
});


</script>

@endsection

@endsection
