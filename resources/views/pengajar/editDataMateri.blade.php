@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('dataMateri.update',$dataMateri->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method("PUT")
                <input type="hidden" name="materi_id" value="{{$dataMateri->materi_id}}">
            <input type="hidden" name="sub_materi_id" value="{{$dataMateri->sub_materi_id}}">
                  <div class="form-group">
                      <label for="">Kata</label>
                      <input type="text" class="form-control" name="kata" value="{{$dataMateri->kata}}">
                  </div>
                  <div class="form-group">
                      <label for="">Gambar</label>
                      <input type="file" name="gambar" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Sound</label>
                    <input type="file" name="sound" id="" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-md mt-3 mb-5">Update</button>
              </form>
        </div>
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
