@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Daftar Materi</h1>
    <a href="{{ route('materials.create') }}" class="btn btn-primary">Tambah Materi</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Kursus</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $material->title }}</td>
                    <td>{{ $material->description }}</td>
                    <td>{{ $material->course ? $material->course->title : 'Tidak ada' }}</td>
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
        </tbody>
    </table>

    
    </table>
</div>
@endsection