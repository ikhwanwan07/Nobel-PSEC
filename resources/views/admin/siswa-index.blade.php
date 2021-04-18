@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Siswa</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Siswa
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
              <form action="{{ route('create-siswa') }}" method="POST">
                  @csrf
                @method("POST")
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
                  <input type="text" name="nama" id="" class="form-control">
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
                    <input type="text" name="kota" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Nomor Handphone</label>
                    <input type="text" name="nomor" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal" id="" class="form-control">
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
                      <select name="kelas" id="" class="form-control">
                          <option value="Basic Junior 1">Basic Junior 1</option>
                          <option value="Basic Junior 2">Basic Junior 2</option>
                          <option value="Basic Senior 1">Basic Senior 1</option>
                          <option value="Basic Senior 2">Basic Senior 2</option>

                      </select>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control">
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
                            <th>Nama Siswa</th>
                            <th>Jenis kelamin</th>
                            <th>Kota</th>
                            <th>Nomor</th>
                            <th>Tanggal-lahir</th>
                            <th>Pengajar</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($siswa as $siswa)
                        <tr>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->jenisKelamin}}</td>
                            <td>{{$siswa->kota}}</td>
                            <td>{{$siswa->nomor}}</td>
                            <td>{{$siswa->tanggal}}</td>
                            <td>{{$siswa->guru->nama}}</td>
                            <td>{{$siswa->kelas}}</td>
                            <td>
                              <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button >
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
