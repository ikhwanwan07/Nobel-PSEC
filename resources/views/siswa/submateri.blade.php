@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Sub Materi</h1>

    <div class="card mb-5">
        <div class="card-header">
            {{$dataMateri->judul_materi}}
        </div>
        <div class="card-body">
          <p class="card-text">{{$dataMateri->deskripsi}}</p>
        </div>
      </div>

    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Sub Materi</th>
                            <th>Data Materi</th>
                            <th>Links</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no =1;
                        ?>
                        @foreach ($dataMateri->submateri as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->judul_sub}}</td>
                            @if ($item->status == 1)
                            <td><a class="btn btn-info btn-sm" href="{{ route('showSubMateri', $item->id) }}">View</a></td>
                            <th><a href="{{$item->link}}" target="_blank">Link</a></th>
                            @else
                            <td><button class="btn btn-info btn-sm" disabled>View</button></td>
                            <th><button class="btn btn-info btn-sm"" disabled>Link</button></th>
                            @endif


                            {{-- <td>
                              <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button >
                              </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
