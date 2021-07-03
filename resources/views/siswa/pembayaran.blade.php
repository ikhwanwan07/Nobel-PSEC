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
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Pembayaran</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1;
                        ?>
                        @foreach ($dataPembayaran as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->siswa->nama}}</td>
                            <td>{{$item->pembayaran_ke}}</td>
                            <td>
                                @if ($item->status == 1)
                                <button class="btn  btn-success btn-sm">Lunas</button>
                                @else
                                <button class="btn  btn-danger btn-sm">Belum Lunas</button>
                                @endif

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
