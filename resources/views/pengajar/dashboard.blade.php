@extends('layouts.master')
@section('content')
<style>
    .fa-arrow-up {
        color: greenyellow;
    }
    .fa-arrow-down {
        color: red;
    }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">Rata Rata Nilai Pretest</div>
                <h1 class="text-center">
                    {{$fix1}}
                </h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body text-center">Rata-Rata Nilai PostTest</div>
                <h1 class="text-center">
                    @if (!empty($fix2))
                    {{$fix2}}
                    @else
                        Belum ada nilai
                    @endif

                </h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">Nama Kelas</div>
                <h1 class="text-center">Basic Junior 1</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
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
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div> --}}

    <h3 class="mt-4 mb-5">Rata Rata Pretest Posttes</h3>
    <div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header text-center">
                {{-- <i class="fas fa-chart-bar mr-1"></i> --}}
                {{$fixNilai3}}
            </div>
            {{-- <div class="card-body"><canvas id="test" width="100%" height="40"></canvas></div> --}}
            <div class="row justify-content-center">
                <div class="col mx-5 my-5">
                    <h4> {{$fixNilai4}}</h4>
                </div>
                <div class="col my-4">
                    @if ($fixNilai4 < $fixNilai5 )
                    <i class="fa fa-arrow-up">
                        <h5>{{$fixNilai5 - $fixNilai4}}</h5>
                    </i>


                    @else
                    <i class="fa fa-arrow-down ">
                        <h5>{{$fixNilai5 - $fixNilai4}}</h5>
                    </i>

                    @endif

                </div>
                <div class="col mx-2 my-5">
                    <h4> {{$fixNilai5}}</h4>
                </div>

            </div>
        </div>
    </div>

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    Post Test
                </div>
                <div class="card-body"><canvas id="posttest" width="100%" height="40"></canvas></div>
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
  type: 'line',
  data: {
    labels: {!! json_encode($data) !!} ,
    datasets: [{
      label: "Rerata Nilai Pretest",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data : {!! json_encode($data2) !!},
    //   data: [4215, 5312, 6251, 7841, 9821, 14984],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'Nilai'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
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
      display: false
    }
  }
});

//Posttest

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("posttest");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: {!! json_encode($data3) !!} ,
    datasets: [{
      label: "rerata Nilai posttest",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: {!! json_encode($data4) !!} ,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'Nilai'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
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
      display: false
    }
  }
});

</script>

@endsection

@endsection
