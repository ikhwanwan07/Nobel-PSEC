@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Kelas</h1>



    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">basic Junior 1</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Basic Junior 2</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Basic Senior 1</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="senior-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="senior" aria-selected="false">Basic Senior 2</a>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Asal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $kelas)
                            <tr>
                                <td> <a href="">{{$kelas->nama}}</a></td>
                                <td>{{$kelas->kelas}}</td>
                                <td>{{$kelas->jenisKelamin}}</td>
                                <td>{{$kelas->kota}}</td>
                                <td>
                                  <form action="" method="POST">
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
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        <div class="tab-pane fade" id="senior2" role="tabpanel" aria-labelledby="senior2-tab">...</div>
      </div>




    </div>

</div>

@endsection
