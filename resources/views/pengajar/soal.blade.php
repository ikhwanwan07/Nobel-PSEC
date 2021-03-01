@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Soal</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Soal
      </button>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Soal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="guru_id" value="{{$guru_id}}">
            <div class="form-group">
              <label for="">Kelas</label>
              <select name="kelas" id="" class="form-control">
                <option value="">Silahkan pilih kelas</option>
                <option value="Basic Junior 1">Basic Junior 1</option>
                <option value="Basic Junior 2">Basic Junior 2</option>
                <option value="Basic Senior 1">Basic Senior 1</option>
                <option value="Basic Senior 2">Basic Senior 2</option>

              </select>
            </div>
                  <div class="form-group">
                    <label for="">Soal</label>
                    <input type="file" name="soal" id="" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Jenis</label>
                    <select name="jenis" id="" class="form-control">
                        <option value="">Silahkan pilih jenis</option>
                        <option value="Pretest">Pretest</option>
                        <option value="Posttest">Posttest</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="">Minggu ke- </label>
                      <select name="minggu_ke" id="" class="form-control">
                          <option value="">Silahkan pilih Minggu</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                      </select>
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
                            <th>Kelas</th>
                            <th>Jenis</th>
                            <th>Minggu ke</th>
                            <th>Soal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dataSoal as $item)


                        <tr>
                            <td>{{$item->kelas}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->minggu_ke}}</td>
                            <td><a href="{{ route('soal.show', $item->id) }}">{{$item->soal}}</a></td>
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
