@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>
    <div class="card mb-5">
        <div class="card-header">
            {{$dataMateri->judul_materi}}
        </div>
        <div class="card-body">
          <p class="card-text">{{$dataMateri->deskripsi}}</p>
          <p class="text-monospace mb-0 btn btn-sm btn-success">{{$dataMateri->created_at->format('d, M Y')}}</p>
        </div>
      </div>

      <div class="row">
          <div class="col-3 d-flex">
            <div class="card" style="width: 15rem;">
                <img src="{{asset('admin/assets/img/RG1.png')}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Card title</h5>
                  <button type="button" class="btn btn-primary audio"  data-id="1">Play</button>
                  <audio controls  data-id="1" style="display: none">
                    <source src="{{asset('admin/assets/brg.mp3')}}" type="audio/mpeg">
                  </audio>
                </div>
          </div>
      </div>
      <div class="col-3">
        <div class="card" style="width: 15rem;">
            <img src="{{asset('admin/assets/img/RG1.png')}}" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <button type="button" class="btn btn-primary audio"  data-id="1">Play</button>
              <audio controls  data-id="1" style="display: none">
                <source src="{{asset('admin/assets/brg.mp3')}}" type="audio/mpeg">
              </audio>
            </div>
      </div>
  </div>
  <div class="col-3">
    <div class="card" style="width: 15rem;">
        <img src="{{asset('admin/assets/img/RG1.png')}}" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title">Card title</h5>
          <button type="button" class="btn btn-primary audio"  data-id="2">Play</button>
          <audio controls  data-id="2" style="display: none">
            <source src="{{asset('admin/assets/digi.mp3')}}" type="audio/mpeg">
          </audio>
        </div>
  </div>
</div>
<div class="col-3">
    <div class="card" style="width: 15rem;">
        <img src="{{asset('admin/assets/img/RG1.png')}}" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title">Card title</h5>
          <button type="button" class="btn btn-primary audio"  data-id="2">Play</button>
          <audio controls  data-id="2" style="display: none">
            <source src="{{asset('admin/assets/digi.mp3')}}" type="audio/mpeg">
          </audio>
        </div>
  </div>
</div>
<div class="col-3 mt-3">
    <div class="card" style="width: 15rem;">
        <img src="{{asset('admin/assets/img/RG1.png')}}" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title">Card title</h5>
          <button type="button" class="btn btn-primary audio"  data-id="2">Play</button>
          <audio controls  data-id="2" style="display: none">
            <source src="{{asset('admin/assets/digi.mp3')}}" type="audio/mpeg">
          </audio>
        </div>
  </div>
</div>

      </div>


      {{-- <div class="gambar">
        <h5>Ruangguru</h5>
        <button type="button" class="audio" data-id="1">Coba</button>
        <img src="{{asset('admin/assets/img/RG1.png')}}" alt="" width="100" height="100">
        <audio controls  data-id="1" style="display: none">
          <source src="{{asset('admin/assets/brg.mp3')}}" type="audio/mpeg">
        </audio>
      </div> --}}

      {{-- <div class="gambar">
        <h5>Ruangguru</h5>
        <button type="button" class="audio" data-id="2">Coba</button>
        <img src="{{asset('admin/assets/img/RG1.png')}}" alt="" width="100" height="100">
        <audio controls  data-id="2" style="display: none">
          <source src="{{asset('admin/assets/digi.mp3')}}" type="audio/mpeg">

        </audio>
      </div> --}}


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
