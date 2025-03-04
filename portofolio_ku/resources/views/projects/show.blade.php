@extends('layouts.main')

@section('title', 'Detail Proyek')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3">Detail Proyek</h2>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <h3>{{ $project->title }}</h3>
            <p>{{ $project->description }}</p>
            
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded mt-3" alt="Gambar Proyek" width="300">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>
    </div>
</div>
@endsection
