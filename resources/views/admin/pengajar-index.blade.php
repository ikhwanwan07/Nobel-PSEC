@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Pengajar</h1>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
    Tambah Pengajar
  </button>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pengajar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/guru" method="POST">
            @method("POST")
            @csrf
              <div class="form-group">
              <label for="">Nama pengajar</label>
              <input type="text" name="nama" id="" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
              @error('nama')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
                <label for="">Nomor Handphone</label>
                <input type="text" name="nomor" id="" class="form-control @error('nomor') is-invalid @enderror" value="{{ old('nomor') }}">
                @error('nomor')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror">
                @error('password')
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
  </div>
    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pengajar</th>
                            <th>Nomor handphone</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($guru as $guru)
                        <tr>
                        <td>{{$guru->nama}}</td>
                        <td>{{$guru->nomor}}</td>
                            <td>
                              <form action="{{ route('delete-guru', $guru->id) }}" method="POST">
                              <a href="{{ route('edit-guru', $guru->id) }}" class="btn btn-info btn-sm">Edit</a>
                              @csrf
                              @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
