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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   Tambah
  </button>
  @if (session('error'))
  <div class="alert alert-danger" role="alert">
      {{session('error')}}
  </div>
  @endif

  @if (session('sukses'))
  <div class="alert alert-success" role="alert">
      {{session('sukses')}}
  </div>
  @endif

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf
            @method('POST')
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
                 <label for="">Nama siswa</label>
                 <input type="hidden" name="siswa_id" value="{{$dataSiswa->id}}">
                 <input type="text"  class="form-control" value="{{$dataSiswa->nama}}" disabled>
             </div>
             <div class="form-group">
                 <label for="">Pembayaran ke</label>
                <select name="pembayaran_ke" id=""  class="form-control">
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
  </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Pembayaran Ke</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no =1;
                        ?>
                        @foreach ($dataSiswa->pembayaran as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->siswa->nama}}</td>
                            <td>{{$data->pembayaran_ke}}</td>
                            <td>
                                @if ($data->status == 1)
                                <button class="btn  btn-success btn-sm">Lunas</button>
                                @else
                                <button class="btn  btn-danger btn-sm">Belum Lunas</button>
                                @endif

                            </td>
                            <td>

                                <form action="{{ route('pembayaran.destroy', $data->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('pembayaran.edit', $data->id)}}" class="btn btn-info btn-sm">Edit</a>
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
