@extends('layouts.app')

@section('title', 'Detail Materi')

@section('content')
<div class="container mt-4">
    <h1>Detail Materi: {{ $material->title }}</h1>

    <div class="card">
        <div class="card-header">
            <h5>{{ $material->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong></p>
            <p>{{ $material->description }}</p>
            <p><strong>Kursus Terkait:</strong> {{ $material->course->title }}</p>
            <a href="{{ route('courses.show', $material->course_id) }}" class="btn btn-secondary">Kembali ke Kursus</a>
        </div>
    </div>
</div>
@endsection