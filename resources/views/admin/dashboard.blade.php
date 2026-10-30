@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <p class="text-uppercase text-secondary small fw-bold mb-1">Ringkasan</p>
            <h1 class="h2 fw-bold mb-1">Dashboard</h1>
            <p class="text-secondary mb-0">Kelola portfolio project dari satu tempat.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary px-4 py-2">+ Tambah Project</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="card stat-card shadow-sm h-100"><div class="card-body d-flex align-items-center justify-content-between">
                <div><p class="text-secondary mb-1">Total Project</p><div class="h2 fw-bold mb-0">{{ $totalProjects }}</div></div>
                <span class="stat-icon">▤</span>
            </div></div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card stat-card shadow-sm h-100"><div class="card-body d-flex align-items-center justify-content-between">
                <div><p class="text-secondary mb-1">Project Aktif</p><div class="h2 fw-bold mb-0">{{ $activeProjects }}</div></div>
                <span class="stat-icon">✓</span>
            </div></div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card stat-card shadow-sm h-100"><div class="card-body d-flex align-items-center justify-content-between">
                <div><p class="text-secondary mb-1">Diarsipkan</p><div class="h2 fw-bold mb-0">{{ $archivedProjects }}</div></div>
                <span class="stat-icon">▣</span>
            </div></div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 d-flex flex-wrap justify-content-between align-items-center gap-2 px-4 pt-4">
            <div><h2 class="h5 fw-bold mb-1">Project Terbaru</h2><p class="text-secondary small mb-0">Project yang terakhir ditambahkan atau diperbarui.</p></div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary btn-sm">Semua Project</a>
        </div>
        <div class="table-responsive px-3 pb-3">
            <table class="table align-middle mb-0">
                <thead class="text-secondary small"><tr><th>PROJECT</th><th>TEKNOLOGI</th><th>STATUS</th><th class="text-end">AKSI</th></tr></thead>
                <tbody>
                    @forelse ($recentProjects as $project)
                        <tr>
                            <td><div class="d-flex align-items-center gap-3">
                                <img src="{{ $project->image_url }}" alt="" width="54" height="42" class="rounded" style="object-fit: cover">
                                <span class="fw-semibold">{{ $project->title }}</span>
                            </div></td>
                            <td>{{ $project->teknologi }}</td>
                            <td><span class="badge rounded-pill {{ $project->status === 'Archived' ? 'text-bg-secondary' : 'text-bg-success' }}">{{ $project->status }}</span></td>
                            <td class="text-end"><a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-warning">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-4 text-secondary">Belum ada project.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
