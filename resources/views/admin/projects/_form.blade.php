<form action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($project->exists)
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="title" class="form-label">Nama Project</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="teknologi" class="form-label">Teknologi</label>
            <input type="text" id="teknologi" name="teknologi" class="form-control @error('teknologi') is-invalid @enderror" value="{{ old('teknologi', $project->teknologi) }}" required>
            @error('teknologi')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}" @selected(old('status', $project->status ?? 'Active') === $status)>{{ $status }}</option>
                @endforeach
            </select>
            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">Gambar {{ $project->exists ? '(boleh dikosongkan)' : '' }}</label>
            <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" class="form-control @error('image') is-invalid @enderror" {{ $project->exists ? '' : 'required' }}>
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            @if ($project->exists && $project->image)
                <div class="mt-2"><img src="{{ $project->image_url }}" alt="Gambar saat ini" width="150"></div>
            @endif
        </div>
        <div class="col-12 mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $project->description) }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ $project->exists ? 'Simpan Perubahan' : 'Simpan' }}</button>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
</form>
