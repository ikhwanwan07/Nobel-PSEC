@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Test</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Test
      </button>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Test</h5>
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
                <label for="">Judul Materi</label>
                <select name="materi_id" id="" class="form-control">
                    @foreach ($materi as $item)
                    <option value="{{$item->id}}">{{$item->judul_materi}}</option>
                    @endforeach
                </select>
              </div>
            {{-- <div class="form-group">
                <label for="">Judul Soal</label>
                <input type="text" name="judul_quiz" id="" class="form-control">
              </div> --}}
                  <div class="form-group">
                    <label for="">Link Test</label>
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
                            <th>Judul Materi</th>
                            <th>Link</th>
                            <th>Deskripsi</th>
                            <th>Soal</th>
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
                            <td>{{$item->materi->judul_materi}}</td>
                            <td><a href="{{$item->quiz}}" target="_blank" class="btn btn-primary btn-sm">Link</a></td>
                            <td>{{$item->deskripsi}}</td>
                            <td>{{$item->soal}}</td>
                            <td>
                              <form action="{{ route('quiz.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('quiz.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
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
