@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Test</h1>

    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Link</th>
                            <th>Deskripsi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no =1;
                        ?>
                        @foreach ($quiz as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td><a href="{{$item->quiz}}" target="_blank" class="btn btn-primary">Link</a></td>
                            <td>{{$item->deskripsi}}</td>
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
