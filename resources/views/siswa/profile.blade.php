@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>

    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center">Nama Siswa</div>
                <h1 class="text-center">Amar</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/admin/data-pengajar">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">Nama Pengajar</div>
                <h1 class="text-center">Nobel sidiq</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/admin/data-siswa">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body text-center">Rata-Rata Nilai</div>
                <h1 class="text-center">90</h1>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    Profile Siswa
                </div>
                <table class="table table-borderless">
                    <tr>
                        <td>Nama</td>
                        <td>Siswa1</td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td>buton</td>
                    </tr>
                    <tr>
                        <td>tanggal lahir</td>
                        <td>25 jan 2019</td>
                    </tr>
                    <tr>
                        <td>NO HP</td>
                        <td>0813929298912</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

@endsection
