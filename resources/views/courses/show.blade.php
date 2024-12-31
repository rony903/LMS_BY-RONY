@extends('layouts.app')

@section('content')
<div class="container">
<h1>Detail Kursus: {{ $course->title }}</h1>
    <p>{{ $course->description }}</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Daftar Materi</h2>
    <a href="{{ route('materials.create', ['course_id' => $course->id]) }}" class="btn btn-primary mb-3">Tambah Materi</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul Materi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($course->materials->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">Tidak ada materi untuk kursus ini.</td>
                </tr>
            @else
                @foreach ($course->materials as $material)
                    <tr>
                        <td>{{ $material->title }}</td>
                        <td>{{ $material->description }}</td>
                        <td>
                            <a href="{{ route('materials.show', $material->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection