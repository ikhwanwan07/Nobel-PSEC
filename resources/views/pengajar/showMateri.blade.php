@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>
        <div class="card-body">
            {{-- diubah lebiih bagus --}}
            <h4>{{$dataMateri->judul_materi}}</h4>
            <p>{{$dataMateri->deskripsi}}</p>
            <embed src="{{url('storage/'.$dataMateri->materi)}}" type="application/pdf" width="100%" height="700px">
        </div>
    </div>

</div>

@endsection
