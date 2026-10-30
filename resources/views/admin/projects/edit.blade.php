@extends('admin.layout')

@section('title', 'Edit Project')

@section('content')
    <h1 class="h3 mb-4">Edit Project</h1>
    <div class="card shadow-sm"><div class="card-body">@include('admin.projects._form')</div></div>
@endsection
