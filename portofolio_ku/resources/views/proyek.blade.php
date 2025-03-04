@extends('layouts.main')

@section('title', 'Proyek')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Proyek Saya</h1>

    @if($projects->count() > 0)
        <ul class="list-group">
            @foreach($projects as $project)
                <li class="list-group-item">{{ $project->title }}</li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-warning text-center mt-3">Belum ada proyek yang tersedia.</div>
    @endif
</div>
@endsection
