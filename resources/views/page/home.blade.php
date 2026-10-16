@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="container flex-grow-1">
    <div class="col-md-12">
        <h2>Selamat Datang</h2>
        <p class="text-muted">Ini halaman utama web profile mahasiswa prodi SI UNPAM</p>
        <a href="{{ url('/profile') }}" class="btn btn-success">Lihat Profile</a>
    </div>
</div>

@endsection