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
                                <form action="{{ route('delete-user', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="" class="btn btn-info btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button >
                                  </form>
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
