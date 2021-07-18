@extends('layouts.master')
@section('content')
<style>

body{
    margin-top:20px;
    background:#eee;
}


/* Component: Well */
.well {
  overflow: hidden;
  border-radius: 0;
  margin-bottom: 30px;
}
.well .well-heading .controls {
  position: absolute;
  top: 10px;
  right: 30px;
}
.well .well-body {
  margin-top: 20px;
  position: relative;
  z-index: 3;
}
.well .well-image {
  font-size: 90px;
  line-height: 90px;
  position: absolute;
  top: 20px;
  right: 30px;
  z-index: 1;
  color: rgba(0, 0, 0, 0.15);
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  -ms-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
.well.well-solid {
  color: white;
}
.well:hover .well-image {
  font-size: 60px;
}
.well-white {
  background-color: white;
  color: #454545;
}
.well-blue {
  background-color: #2980b9;
  color: white;
}
.well-light-blue {
  background-color: #3498db;
  color: white;
}
.well-green {
  background-color: #27ae60;
  color: white;
}
.well-light-green {
  background-color: #2ecc71;
  color: white;
}
.well-orange {
  background-color: #e82c0c;
  color: white;
}
.well-light-orange {
  background-color: #ff530d;
  color: white;
}
.well-red {
  background-color: #d40d12;
  color: white;
}
.well-light-red {
  background-color: #ff1d23;
  color: white;
}
.well-purple {
  background-color: #8e44ad;
  color: white;
}
.well-light-purple {
  background-color: #9b59b6;
  color: white;
}
.well-pink {
  background-color: #fe31ab;
  color: white;
}
.well-light-pink {
  background-color: #fd32c0;
  color: white;
}

.mini-profile-widget .image-container .avatar {
    width: 180px;
    height: 180px;
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    background: white;
    padding: 4px;
    border: 1px solid #dddddd;
}

.btn-blue {
  background-color: #3498db;
  border-color: #3498db;
  color: white;
}
.btn-blue:hover,
.btn-blue:visited {
  background-color: #2980b9;
  color: white;
}
.btn-green {
  background-color: #2ecc71;
  border-color: #27ae60;
  color: white;
}
.btn-green:hover,
.btn-green:visited {
  background-color: #27ae60;
  color: white;
}
.btn-orange {
  background-color: #ff530d;
  border-color: #e82c0c;
  color: white;
}
.btn-orange:hover,
.btn-orange:visited {
  background-color: #e82c0c;
  color: white;
}
.btn-red {
  background-color: #ff1d23;
  border-color: #d40d12;
  color: white;
}
.btn-red:hover,
.btn-red:visited {
  background-color: #d40d12;
  color: white;
}
.btn-purple {
  background-color: #9b59b6;
  border-color: #8e44ad;
  color: white;
}
.btn-purple:hover,
.btn-purple:visited {
  background-color: #8e44ad;
  color: white;
}
.btn-pink {
  background-color: #fd32c0;
  border-color: #fe31ab;
  color: white;
}
.btn-pink:hover,
.btn-pink:visited {
  background-color: #fe31ab;
  color: white;
}
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
        <div class="col-md-12">
            <div class="well well-white mini-profile-widget bootdey.com">
                <div class="col-md-6">
                    <div class="image-container">

                        <img src="{{asset('admin/assets/img/user.png')}}" class="avatar img-responsive" alt="avatar">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="details">
                        <h4>{{auth::user()->siswa->nama}}</h4>
                        <hr style="width:100%">
                        <div> <b>Nomor</b> </div> <p>{{auth::user()->siswa->nomor}}</p>
                        <div><b>Alamat</b>  </div> <p>{{auth::user()->siswa->kota}}</p>
                        <div> <b>Kelas</b> </div> <p>{{auth::user()->siswa->kelas}}</p>
                        <div><b>Jenis Kelamin</b></div> <p>{{auth::user()->siswa->jenisKelamin}}</p>
                        <p class="mg-top-20">
                            <a href="javascript:void(0);" class="btn btn-green">
                                <i class="fa fa-whatsapp fa-fw"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-info">
                                <i class="fa fa-phone fa-fw"></i>
                            </a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>

    {{-- <div class="col-xl-6 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body text-center">Rata Rata Nilai</div>
            <h1 class="text-center">80</h1>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    </div> --}}

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
    <h3 class="mt-4 mb-5">Chat Pretest Posttest</h3>
    <div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header text-center">
                {{-- <i class="fas fa-chart-bar mr-1"></i> --}}
                {{$fixNilai3}}
            </div>
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
            {{-- <div class="card-body"><canvas id="test" width="100%" height="40"></canvas></div> --}}
        </div>
    </div>

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>

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
    type: "bar",
    data: {
        labels:{!! json_encode($data3) !!} ,
        datasets: [
            {
            label: "Nilai Pretest",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
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
