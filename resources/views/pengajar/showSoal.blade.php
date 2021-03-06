@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Latihan</h1>

    <div class="card mb-5">
        <div class="card-header">
           Latihan Minggu ke - {{$dataSoal->minggu_ke}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$dataSoal->kelas}}</h5>
          <p class="text-monospace mb-0">{{$dataSoal->created_at->format('d, M Y')}}</p>
        </div>
      </div>
     <embed src="{{url('storage/'.$dataSoal->soal)}}" type="application/pdf" width="100%" height="700px">
    </div>


@endsection
