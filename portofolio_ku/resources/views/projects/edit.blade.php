@extends('layouts.main')

@section('title', 'Edit Proyek')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3">Edit Proyek</h2>
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

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Proyek</label>
                <input type="text" name="title" id="title" class="form-control form-control-lg" value="{{ $project->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control form-control-lg" rows="4" required>{{ $project->description }}</textarea>
            </div>

            {{-- Tampilkan gambar lama jika ada --}}
            @if($project->image)
                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini:</label>
                    <div class="d-flex">
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-thumbnail rounded shadow-sm" width="150" alt="Gambar Lama">
                    </div>
                </div>
            @endif

            {{-- Input untuk gambar baru --}}
            <div class="mb-3">
                <label for="image" class="form-label">Ganti Gambar (Opsional)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Perbarui</button>
        </form>
    </div>
</div>
@endsection
