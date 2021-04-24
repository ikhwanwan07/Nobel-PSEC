@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Siswa</h1>


      <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('update-siswa',$siswa->id) }}" method="POST">
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
                <div class="form-group">
                <label for="">Nama Siswa</label>
                <input type="text" name="nama" id="" class="form-control" value="{{$siswa->nama}}">
              </div>
              <div class="form-group">
                  <label for="">Jenis Kelamin</label> <br>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1"  value="Laki-Laki">
                      <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="Perempuan">
                      <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>

                </div>
                <div class="form-group">
                  <label for="">Tempat Lahir</label>
                  <input type="text" name="kota" id="" class="form-control" value="{{$siswa->kota}}">
                </div>
                <div class="form-group">
                  <label for="">Nomor Handphone</label>
                  <input type="text" name="nomor" id="" class="form-control" value="{{$siswa->nomor}}">
                </div>
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input type="date" name="tanggal" id="" class="form-control" value="{{$siswa->tanggal}}">
                </div>
                <div class="form-group">
                  <label for="">Pengajar</label>
                  <select name="guru_id" id="" class="form-control">
                      @foreach ($guru as $guru)
                      <option value="{{$guru->id}}">{{$guru->nama}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="kelas" id="" class="form-control" value="{{$siswa->kelas}}">
                        <option value="Basic Junior 1">Basic Junior 1</option>
                        <option value="Basic Junior 2">Basic Junior 2</option>
                        <option value="Basic Senior 1">Basic Senior 1</option>
                        <option value="Basic Senior 2">Basic Senior 2</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
