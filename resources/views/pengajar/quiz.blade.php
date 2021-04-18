@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">DataTest</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Test
      </button>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Quiz</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('quiz.store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="">Judul Soal</label>
                <input type="text" name="judul_quiz" id="" class="form-control">
              </div>
                  <div class="form-group">
                    <label for="">Link Quiz</label>
                    <input type="text" name="quiz" id="" class="form-control">
                  </div>
                  <div class="form-group">
                  <label for="">Soal</label>
                  <select name="soal" id="" class="form-control">
                      <option value="pretest">PreTest</option>
                      <option value="posttest">PostTest</option>
                  </select>
                </div>
                  <div class="form-group">
                      <label for="">Deskripsi</label>
                      <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
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
                            <th>NO</th>
                            <th>Judul</th>
                            <th>Link</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no =1;
                        ?>
                        @foreach ($quiz as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->judul_quiz}}</td>
                            <td><a href="{{$item->quiz}}" target="_blank" class="btn btn-primary btn-sm">Link</a></td>
                            <td>{{$item->deskripsi}}</td>
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
