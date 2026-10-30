<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    private array $statuses = [
        'Active',
        'Archived',
        'Selesai',
        'In Progress',
    ];

    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalProjects' => Project::count(),
            'activeProjects' => Project::whereIn('status', ['Active', 'Selesai', 'In Progress'])->count(),
            'archivedProjects' => Project::where('status', 'Archived')->count(),
            'recentProjects' => Project::latest()->take(5)->get(),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Kamu telah keluar dari halaman admin.');
    }

    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create', [
            'project' => new Project(),
            'statuses' => $this->statuses,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'teknologi' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in($this->statuses)],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['image'] = $request->file('image')->store('projects', 'public');
        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project,
            'statuses' => $this->statuses,
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'teknologi' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in($this->statuses)],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $newImage = $request->file('image');
        unset($data['image']);

        if ($newImage) {
            $this->deleteUploadedImage($project->image);
            $data['image'] = $newImage->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $this->deleteUploadedImage($project->image);
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    private function deleteUploadedImage(?string $image): void
    {
        if ($image && str_starts_with($image, 'projects/')) {
            Storage::disk('public')->delete($image);
        }
    }
}
