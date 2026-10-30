@extends('layouts.app')

@section('title', 'Project Detail')

@section('content')
<div class="container py-4 py-lg-5">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 bg-dark">
                        <img src="{{ $project->image_url }}"
                             alt="Gambar {{ $project->title }}"
                             class="w-100 h-100"
                             style="min-height: 420px; max-height: 620px; object-fit: cover;">
                    </div>

                    <div class="col-lg-6">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column h-100">
                            <div class="mb-4">
                                <span class="badge rounded-pill text-bg-primary mb-3">Detail Project</span>
                                <h1 class="h2 fw-bold mb-2">{{ $project->title }}</h1>
                                <p class="text-secondary mb-0">Informasi lengkap project portfolio.</p>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <div class="border rounded-3 p-3 h-100">
                                        <div class="small text-secondary mb-2">Teknologi yang Digunakan</div>
                                        <span class="badge text-bg-primary">{{ $project->teknologi }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="border rounded-3 p-3 h-100">
                                        <div class="small text-secondary mb-2">Status Project</div>
                                        <span class="badge {{ in_array($project->status, ['Archived', 'Arsip']) ? 'text-bg-secondary' : 'text-bg-success' }}">
                                            {{ $project->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-light rounded-3 p-3 p-lg-4 mb-4">
                                <h2 class="h6 fw-bold">Deskripsi Project</h2>
                                <p class="text-secondary mb-0" style="white-space: pre-line">{{ $project->description }}</p>
                            </div>

                            <div class="small text-secondary mb-4">
                                Dibuat: {{ $project->created_at?->format('d M Y') ?? '-' }}
                            </div>

                            <a href="{{ route('project.index') }}" class="btn btn-danger w-100 mt-auto py-2">
                                Kembali ke Daftar Project
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
