<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/about', function () {
    return view('page.about');
});

Route::get('/profile', [MahasiswaController::class, 'index']);

Route::get('/project', [ProjectController::class, 'index'])
    ->name('project.index');

Route::get('/project/{id}', [ProjectController::class, 'show'])
    ->name('project.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminProjectController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminProjectController::class, 'logout'])->name('logout');

    Route::resource('projects', AdminProjectController::class)
        ->except(['show']);
});
