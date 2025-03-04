@extends('layouts.main')

@section('title', 'Daftar Proyek')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3 text-center">Daftar Proyek</h2>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($projects->count() > 0)
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top fixed-size-img" alt="Gambar Proyek">
                        @else
                            <div class="text-muted text-center p-3">Tidak ada gambar</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center">Belum ada proyek yang tersedia.</div>
    @endif
</div>

{{-- Tambahkan CSS untuk mengatur ukuran gambar --}}
<style>
    .fixed-size-img {
        width: 100%;
        height: 200px; /* Atur tinggi tetap */
        object-fit: cover; /* Potong gambar agar tetap proporsional */
    }
</style>
@endsection
