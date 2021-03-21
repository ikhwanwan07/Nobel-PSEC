@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Materi
      </button>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Meteri</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('pengajar.store') }}" method="POST" enctype="multipart/form-data">
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
                  <label for="">Judul Materi</label>
                  <input type="text" name="judul_materi" id="" class="form-control">
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
                    <label for="">Link</label>
                    <input type="text" name="link" id="" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Materi</label>
                    <input type="file" name="materi" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Status Soal</label>
                      <select name="status" id="" class="form-control">
                          <option value="1">Tampil</option>
                          <option value="0">Tidak Tampil</option>
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>
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
                            <th>Judul Materi</th>
                            <th>Kelas</th>
                            <th>Link Materi</th>
                            <th>Materi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($materi as $item)
                        <tr>
                            <td>{{$item->judul_materi}}</td>
                            <td>{{$item->kelas}}</td>
                            <td><a class="btn btn-info btn-sm" href="{{$item->link}}" target="_blank">Link</a></td>
                            <td><a class="btn btn-info btn-sm" href="{{ route('pengajar.show', $item->id) }}">View</a></td>
                            <td>
                                @if ($item->status == 1)
                                <button class="btn btn-success btn-sm">Tampil</button>
                                @else
                                <button class="btn btn-danger btn-sm">Tidak Tampil</button>
                                @endif
                            </td>
                            <td>
                              <form action="{{ route('pengajar.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('pengajar.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
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
