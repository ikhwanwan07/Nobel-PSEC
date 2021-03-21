@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Soal</h1>

    <div class="card">
        <div class="card-body">

    <form action="{{ route('soal.update', $dataSoal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <input type="hidden" name="guru_id" value="{{$guru_id}}">
  <div class="form-group">
    <label for="">Kelas</label>
    <select name="kelas" id="" class="form-control">
        <option value="">{{$dataSoal->kelas}}</option>
      <option value="">Silahkan pilih kelas</option>
      <option value="Basic Junior 1">Basic Junior 1</option>
      <option value="Basic Junior 2">Basic Junior 2</option>
      <option value="Basic Senior 1">Basic Senior 1</option>
      <option value="Basic Senior 2">Basic Senior 2</option>

    </select>
  </div>
        <div class="form-group">
          <label for="">Soal</label>
          <input type="file" name="soal" id="" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Jenis</label>
          <select name="jenis" id="" class="form-control" value="">
              <option value="">{{$dataSoal->jenis}}</option>
              <option value="">Silahkan pilih jenis</option>
              <option value="Pretest">Pretest</option>
              <option value="Posttest">Posttest</option>
          </select>
        </div>
        <div class="form-group">
            <label for="">Minggu ke- </label>
            <select name="minggu_ke" id="" class="form-control">
                <option value="">{{$dataSoal->minggu_ke}}</option>
                <option value="">Silahkan pilih Minggu</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
            </select>
        </div>
        <div class="form-group">
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" > {{$dataSoal->deskripsi}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
        </div>
    </div>

</div>

@endsection
