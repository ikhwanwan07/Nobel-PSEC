@extends('layouts.master')
@section('content')

<style>
  .fa-check-circle{
    color: yellowgreen;
  }
  .fa-times-circle {
      color: red;
  }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Data Pembayaran</h1>
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
                              
                                <a href="" class="btn btn-info btn-succes">Verifikasi</a>
                               
                             
                            </td>
                        </tr>
                        <tr>
                            <td>Ikhwan</td>
                            <td>2</td>
                            <td><i class="fa fa-times-circle"></i></td>
                            <td>
                              
                                <a href="" class="btn btn-info btn-succes">Verifikasi</a>
                               
                             
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
    
@endsection