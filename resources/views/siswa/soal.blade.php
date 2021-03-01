@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Soal</h1>

      </div>
    <div class="card mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Jenis Soal</th>
                            <th>Tanggal</th>
                            <th>Pengajar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       
                        <tr>
                            <td>10</td>
                            <td>Pretes</td>
                            <td>10-Juni-2020</td>
                            <td>Ikhwan Nur Haysim</td>
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