@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Soal</h1>
        <div class="card-body">
            {{-- diubah lebiih bagus --}}
            <h4>{{$dataSoal->minggu_ke}}</h4>
            <p>{{$dataSoal->kelas}}</p>
            <embed src="{{url('storage/'.$dataSoal->soal)}}" type="application/pdf" width="100%" height="700px">
        </div>
    </div>

</div>

@endsection
