@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data User</h1>

    <div class="card mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($user as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role}}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
