@extends('layouts.master')
@section('content')
<style>
    .right {
        margin-left: 950px;
    }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>
    <button type="button" class="btn btn-primary right  mb-3" data-toggle="modal" data-target="#exampleModal">upload jawaban</button>

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


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Jawaban Anda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" >
            <div class="form-group">
                <input type="text" name="materi_id" value="{{$dataMateri->id}}" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="siswa_id" value="{{auth::user()->siswa->id}}" disabled>
            </div>
            <div class="form-group">
                <input type="file" name="jawaban" id="" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>

</div>



@endsection
