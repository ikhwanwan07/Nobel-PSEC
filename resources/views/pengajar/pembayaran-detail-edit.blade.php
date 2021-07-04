@extends('layouts.master')
@section('content')

<style>
  .fa-check-circle{
    color: yellowgreen;
  }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Data Pembayaran</h1>
<!-- Button trigger modal -->


  <!-- Modal -->


        <div class="card-body">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                 <div class="form-group">
                     <label for="">Nama siswa</label>
                     <input type="hidden" name="siswa_id" value="{{$pembayaran->id}}">
                     <input type="text"  class="form-control" value="{{$pembayaran->siswa->nama}}" disabled>
                 </div>
                 <div class="form-group">
                     <label for="">Pembayaran ke</label>
                    <select name="pembayaran_ke" id=""  class="form-control" value="{{$pembayaran->siswa->nama}}">
                        <option value="">Pilih pembayaran</option>
                        <option value="Pendaftaran">Pendaftaran</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    </select>
                 </div>
                 <div class="form-group">
                     <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Pilih status</option>
                        <option value="1">Lunas</option>
                        <option value="0">Belum Lunas</option>

                    </select>
                 </div>
                 <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
             </form>
        </div>
    </div>

</div>

@endsection
