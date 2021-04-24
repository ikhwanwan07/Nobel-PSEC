@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Pengajar</h1>
    <!-- Button trigger modal -->
    <div class="card mb-4">

        <div class="card-body">
            <form action="{{ route('update-guru', $guru->id) }}" method="POST">
                @method("PUT")
                @csrf
                  <div class="form-group">
                  <label for="">Nama pengajar</label>
                  <input type="text" name="nama" id="" class="form-control @error('nama') is-invalid @enderror" value="{{ $guru->nama }}">
                  @error('nama')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="form-group">
                    <label for="">Nomor Handphone</label>
                    <input type="text" name="nomor" id="" class="form-control @error('nomor') is-invalid @enderror" value="{{ $guru->nomor }}">
                    @error('nomor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
        </div>
    </div>

</div>

@endsection
