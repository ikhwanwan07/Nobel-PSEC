@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Jawaban</h1>

    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            @foreach ($dataJawaban as $item)
                            <td>{{ auth::user()->siswa->nama}}</td>
                            <td>
                                @if ($item->status == 1)
                               <i class="btn btn-success">Jawaban sudah dikirim</i>
                                @else
                               <i class="btn btn-secondary"> Belum Submit jawaban </i>
                                @endif
                            </td>
                            <td>
                              <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button >
                              </form>
                            </td>
                            @endforeach
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
