@extends('admin.layout')

@section('title', 'Tambah Project')

@section('content')
    <h1 class="h3 mb-4">Tambah Project</h1>
    <div class="card shadow-sm"><div class="card-body">@include('admin.projects._form')</div></div>
@endsection
