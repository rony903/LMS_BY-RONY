@extends('layouts.app')

@section('title', 'Edit Materi')

@section('content')
<div class="container mt-4">
    <h1>Edit Materi</h1>
    <form action="{{ route('materials.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $material->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required>{{ $material->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('courses.show', $material->course_id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection