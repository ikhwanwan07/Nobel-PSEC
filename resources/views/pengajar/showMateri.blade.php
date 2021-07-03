@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>

    <div class="card mb-3">
        <div class="card-header">
            {{$dataMateri->judul_sub}}
        </div>
        <div class="card-body">
          <p class="card-text">{{$dataMateri->deskripsi}}</p>
        </div>
      </div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    Tambah Materi
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('dataMateri.store') }}" enctype="multipart/form-data" method="POST">
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
            <input type="hidden" name="materi_id" value="{{$dataMateri->materi->id}}">
            <input type="hidden" name="sub_materi_id" value="{{$dataMateri->id}}">
              <div class="form-group">
                  <label for="">Kata</label>
                  <input type="text" class="form-control" name="kata">
              </div>
              <div class="form-group">
                  <label for="">Gambar</label>
                  <input type="file" name="gambar" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Sound</label>
                <input type="file" name="sound" id="" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-md mt-3 mb-5">Simpan</button>
          </form>
        </div>

      </div>
    </div>
  </div>
            <table class="table">
                <thead>

                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kata</th>
                    <th scope="col">Sound</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no =1;
                    ?>
    @foreach ($dataMateri->data as $item)
                  <tr>
                    <td>{{$no++}}</td>
                    <td><img src="{{url('storage/'.$item->gambar)}}" alt="" width="100" height="100"></td>
                    <td>{{$item->kata}}</td>
                    <td><audio controls  data-id="2">
                        <source src="{{url('storage/'.$item->sound)}}" type="audio/mpeg">
                      </audio>
                    </td>
                    <td>
                        <form action="{{ route('dataMateri.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('dataMateri.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button >
                          </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>


@section('script')
<script>
    $('.audio').click(function(e){
        // e.preventDefault();
         let id = $(this).data('id')
        console.log('id',id)
        let audio = $("audio[data-id='"+id+"']").trigger('play')

        $('.audio').each(function(i, obj) {
            if($(this).data('id') != id){
                $("audio[data-id='"+$(this).data('id')+"']").trigger('pause')
            }
        });

        console.log('audio',audio)

    });

</script>
@endsection
@endsection
