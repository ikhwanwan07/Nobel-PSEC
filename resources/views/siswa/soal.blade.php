@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Latihan</h1>

      </div>
    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Pengajar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1;
                        ?>
                        @foreach ($soal as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kelas}}</td>
                            <td>{{$item->created_at->format('d-h-Y')}}</td>
                            <td>{{auth::user()->siswa->guru->nama}}</td>
                            <td>
                                @if ($item->status == 1)
                                <a href="{{ route('showSoal', $item->id) }}" class="btn btn-info btn-sm">View</a>
                                @else
                                 <button type="button" class="btn btn-sm btn-info" disabled>View</button>
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
