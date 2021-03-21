@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>
    <div class="card mb-5">
        <div class="card-header">
            {{$dataMateri->judul_materi}}
        </div>
        <div class="card-body">
          <p class="card-text">{{$dataMateri->deskripsi}}</p>
          <p class="text-monospace mb-0 btn btn-sm btn-success">{{$dataMateri->created_at->format('d, M Y')}}</p>
        </div>
      </div>
      <embed src="{{url('storage/'.$dataMateri->materi)}}" type="application/pdf" width="100%" height="700px">




</div>



@endsection
