@extends('admin.layout')

@section('title', 'Data Project')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Data Project</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah Project</a>
    </div>

    @if ($projects->isEmpty())
        <div class="alert alert-info">Belum ada data project.</div>
    @else
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Nama Project</th>
                            <th>Teknologi</th>
                            <th>Status</th>
                            <th style="width: 220px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $index => $project)
                            <tr>
                                <td>{{ $projects->firstItem() + $index }}</td>
                                <td><img src="{{ $project->image_url }}" alt="{{ $project->title }}" width="80" height="55" style="object-fit: cover"></td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->teknologi }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus project ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">{{ $projects->links('pagination::bootstrap-5') }}</div>
    @endif
@endsection
