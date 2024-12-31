@extends('layouts.app')

@section('title', 'Edit Kursus')

@section('content')
<div class="container mt-4">
    <h1>Edit Kursus</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul Kursus</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $course->title) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Kursus</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $course->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="is_active">Aktif</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1" {{ $course->is_active ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$course->is_active ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Kursus</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection