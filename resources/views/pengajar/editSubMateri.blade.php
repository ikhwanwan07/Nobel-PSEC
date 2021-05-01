@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('subMateri.update',$dataMateri->id) }}" method="POST" >
                @csrf
                @method("PUT")
                @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <input type="hidden" name="materi_id" value="{{$dataMateri->materi_id}}">
                <div class="form-group">
                <label for="">Judul Materi</label>
                <input type="text" name="judul_materi" id="" class="form-control" value="{{$dataMateri->judul_sub}}">
              </div>
                <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{$dataMateri->deskripsi}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Link</label>
                    <input type="text" name="link" id="" class="form-control" value="{{$dataMateri->link}}">
                  </div>
                <div class="form-group">
                  <label for="">Status Soal</label>
                    <select name="status" id="" class="form-control" value="{{$dataMateri->status}}">
                        <option value="1">Tampil</option>
                        <option value="0">Tidak Tampil</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>
            </form>
        </div>
    </div>


</div>

@endsection
