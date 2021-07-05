@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4 mb-5">Data Nilai</h1>

  <!-- Modal -->
 <div class="card">
     <div class="card-body">
        <form action="{{ route('nilai.update',$nilai->id) }}" method="POST">
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
            <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="hidden" name="siswa_id" value="{{$nilai->siswa_id}}">
            <input type="text" name="" id="" class="form-control" value="{{$nilai->siswa->nama}}" disabled>
          </div>
          <div class="form-group">
              <label for="">Soal</label> <br>
            <select name="quizzes_id" id="" class="form-control">
                @foreach ($getQuiz as $item)
              <option value="{{$item->id}}">{{$item->judul_quiz}}</option>
              @endforeach
            </select>
            </div>
            <div class="form-group">
              <label for="">Nilai</label>
              <input type="number" name="nilai" id="" class="form-control" value="{{$nilai->nilai}}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
     </div>
 </div>



</div>

@endsection
