<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/proyek', function () {
    return view('proyek');
});

Route::get('/kontak', function () {
    return view('kontak');
});



Route::resource('projects', ProjectController::class);
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/proyek', [ProjectController::class, 'showProyek'])->name('proyek.index');


Route::get('/buat-symlink', function () {
    Artisan::call('storage:link');
    return 'Symlink berhasil dibuat!';
});

Route::get('/uploads/{filename}', function ($filename) {
    $path = env('RAILWAY_ENVIRONMENT', false) ? "/tmp/uploads/$filename" : public_path("uploads/$filename");

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
});
