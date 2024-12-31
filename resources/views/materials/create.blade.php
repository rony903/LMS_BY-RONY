@extends('layouts.app')

@section('title', 'Tambah Materi')

@section('content')
<div class="container mt-4">
    <h1>Tambah Materi</h1>
    <form action="{{ route('materials.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="title" class="form-label">Judul Materi</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="course_id" class="form-label">Kursus</label>
        <select name="course_id" class="form-control" required>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Materi</button>
    
</form>
</div>
@endsection