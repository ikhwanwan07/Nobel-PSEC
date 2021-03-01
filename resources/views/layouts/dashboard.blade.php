@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Selamat datang {{Auth::User()->name}}</h3>
        </div>
    </div>
</div>

@endsection
