@extends('layouts.master')
@section('content')

<style>
  .fa-check-circle{
    color: yellowgreen;
  }
</style>
<div class="container-fluid">
    <h1 class="mt-4">Data Pembayaran</h1>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Pembayaran</th>
                            <th>Status</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>NIssa</td>
                            <td>Pendaftaran</td>
                            <td> <button class="btn  btn-success btn-sm">Lunas</button></td>
                        </tr>

                        <tr>
                            <td>NIssa</td>
                            <td>1</td>
                            <td> <button class="btn  btn-danger btn-sm">Belum Lunas</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
