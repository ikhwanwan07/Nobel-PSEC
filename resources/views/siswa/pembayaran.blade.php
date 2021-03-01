@extends('layouts.master')
@section('content')

<style>
  .fa-check-circle{
    color: yellowgreen;
  }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Data Pembayaran</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Tambah Pembayaran
      </button>
    
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
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
                  <input type="text" name="nama" id="" class="form-control" disabled>
                </div>
                  <div class="form-group">
                    <label for="">Pembayaran ke</label>
                    <select name="" id="" class="form-control">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                      <option value="">4</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Bukti</label>
                    <input type="file" name="tanggal" id="" class="form-control">
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
                            <th>Nama Siswa</th>
                            <th>Pembayaran ke</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       
                        <tr>
                            <td>NIssa</td>
                            <td>1</td>
                            <td><i class="fa fa-check-circle"></i></td>
                            <td>
                              <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button >
                              </form>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
    
@endsection