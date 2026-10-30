<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'teknologi',
        'image',
        'status',
    ];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/project1.jpg');
        }

        // Gambar lama berada di public/images.
        // Gambar baru yang diunggah berada di storage/app/public/projects.
        if (str_contains($this->image, '/')) {
            return Storage::disk('public')->url($this->image);
        }

        return asset('images/' . $this->image);
    }
}