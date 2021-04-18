@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Nilai</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Nilai
      </button>
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Nilai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                  @csrf

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
                    <label for="">Soal</label> <br>
                  <select name="" id="" class="form-control">
                    <option value="">soal1</option>
                    <option value="">soal2</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="">Nilai</label>
                    <input type="text" name="nilai" id="" class="form-control">
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
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $item)
                        <tr>
                            <td><a href="{{ route('nilai.show', $item->id) }}">{{$item->nama}}</a></td>
                            <td>{{$item->jenisKelamin}}</td>
                            <td>{{$item->kota}}</td>
                            <td>{{$item->kelas}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
