@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4 mb-5">Data Nilai</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Nilai
      </button>

      @if (session('error'))
      <div class="alert alert-danger mt-5" role="alert">
          {{session('error')}}
      </div>
      @endif

      @if (session('sukses'))
      <div class="alert alert-success mt-5" role="alert">
          {{session('sukses')}}
      </div>
      @endif
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
          <form action="{{ route('nilai.store') }}" method="POST">
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
              <input type="hidden" name="siswa_id" value="{{$siswa->id}}">
              <input type="text" name="" id="" class="form-control" value="{{$siswa->nama}}" disabled>
            </div>
            <div class="form-group">
                <label for="">Soal</label> <br>
              <select name="quizzes_id" id="" class="form-control">
                  @foreach ($getQuiz as $item)
                <option value="{{$item->id}}">{{$item->judul_quiz}}</option>
                @endforeach
              </select>
              </div>
              <div class="form-group">
                <label for="">Nilai</label>
                <input type="number" name="nilai" id="" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>


    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pretest</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Posttest</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Judul Soal</th>
                                <th>Nilai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $no =1;
                        ?>
                            @foreach ($getNilai as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$siswa->nama}}</td>
                                <td>{{$item->soal}}</td>
                                <td>{{$item->nilai}}</td>
                                <td>
                                    <form action="{{route('nilai.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('nilai.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
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
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="tab-pane fade show active" id="profile-tab" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Soal</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no =1;
                        ?>
                                @foreach ($getNilai2 as $item2)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$siswa->nama}}</td>
                                    <td>{{$item2->soal}}</td>
                                    <td>{{$item2->nilai}}</td>
                                    <td>
                                        <form action="{{route('nilai.destroy', $item2->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('nilai.edit', $item2->id) }}" class="btn btn-info btn-sm">Edit</a>
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




    </div>

</div>

@endsection
