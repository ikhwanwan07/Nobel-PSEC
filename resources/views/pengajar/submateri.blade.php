@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Sub Materi</h1>

    <div class="card mb-5">
        <div class="card-header">
            {{$dataMateri->judul_materi}}
        </div>
        <div class="card-body">
          <p class="card-text">{{$dataMateri->deskripsi}}</p>
        </div>
      </div>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Sub Materi
      </button>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Sub Meteri</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action=" {{ route('subMateri.store',) }} " method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="materi_id" value="{{$dataMateri->id}}">
                  <div class="form-group">
                  <label for="">Judul Materi</label>
                  <input type="text" name="judul_sub" id="" class="form-control">
                </div>
                  <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Links</label>
                    <input type="text" name="link" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Status</label>
                    <select type="text" name="status" id="" class="form-control">
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
                            <th>No</th>
                            <th>Judul Sub Materi</th>
                            <th>Data Materi</th>
                            <th>Links</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no =1;
                        ?>
                        @foreach ($dataMateri->submateri as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->judul_sub}}</td>
                            <td>
                                {{-- @if ($item->status == 1) --}}
                                <a class="btn btn-primary btn-sm" href="{{ route('subMateri.show', $item->id) }}">View</a></td>

                                {{-- @else
                                <button class="btn btn-info btn-sm" disabled>View</button>
                                @endif --}}
                            <td><a href="{{$item->link}}" target="_blank">Link</a></td>
                            <td>
                                @if ($item->status == 1)
                                <button class="btn btn-success btn-sm">Tampil</button>
                                @else
                                <button class="btn btn-danger btn-sm">Tidak Tampil</button>
                                @endif
                            </td>
                            <td>
                              <form action="{{ route('subMateri.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('subMateri.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
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
