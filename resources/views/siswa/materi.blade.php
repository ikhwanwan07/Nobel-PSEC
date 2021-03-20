@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Data Materi</h1>
    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Judul</th>
                            <th>Link</th>
                            <th>Materi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no =1; ?>
                       @foreach ($materi as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kelas}}</td>
                            <td>{{$item->judul_materi}}</td>
                            <td>
                                @if ($item->status == 1)
                                <a href="{{$item->link}}" class="btn btn-info btn-sm" target="_blank">Link</a>
                                @else
                                <button type="button" class="btn btn-sm btn-info" disabled>Link</button>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 1)
                                <a href="{{ route('showMateri',$item->id) }}" class="btn btn-info btn-sm" disabled>View</a>
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
