@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit DataTest</h1>

    <div class="card mb-4">

        <div class="card-body">
            <form action="{{ route('quiz.update',$quizz->id)}}" method="POST" enctype="multipart/form-data">
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
              <label for="">Judul Soal</label>
              <input type="text" name="judul_quiz" id="" class="form-control" value="{{$quizz->judul_quiz}}">
            </div>
                <div class="form-group">
                  <label for="">Link Quiz</label>
                  <input type="text" name="quiz" id="" class="form-control" value="{{$quizz->quiz}}">
                </div>
                <div class="form-group">
                <label for="">Soal</label>
                <select name="soal" id="" class="form-control" value="{{$quizz->soal}}">
                    <option value="pretest">PreTest</option>
                    <option value="posttest">PostTest</option>
                </select>
              </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{$quizz->deskripsi}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>

@endsection
