@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <h1 class="mt-4">Data Jawaban siswa</h1>
    <div class="card mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Jenis Soal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       
                        <tr>
                            <td>NIssa</td>
                            <td>Pretes</td>
                            <td>
                                <a href="" class="btn btn-info btn-sm">View</a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
    
@endsection