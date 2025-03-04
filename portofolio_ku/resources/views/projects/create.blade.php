@extends('layouts.main')

@section('title', 'Tambah Proyek')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3">Tambah Proyek</h2>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card shadow-sm p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Proyek</label>
                <input type="text" name="title" id="title" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control form-control-lg" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Proyek</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Simpan</button>
        </form>
    </div>
</div>
@endsection
