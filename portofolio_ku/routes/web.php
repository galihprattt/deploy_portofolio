<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


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
