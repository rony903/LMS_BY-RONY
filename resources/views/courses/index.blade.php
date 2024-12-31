@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<div class="container">
    <h1>Daftar Kursus</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Tambah Kursus</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Jumlah Peserta</th>
                <th>Jumlah Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($courses as $index => $course)
        <tr>
            <td>{{ $index + 1 }}</td> <!-- Menghitung ID dari indeks -->
            <td>{{ $course->title }}</td>
            <td>{{ Str::limit($course->description, 50) }}</td>
            <td>{{ $course->is_active ? 'Aktif' : 'Tidak Aktif' }}</td> <!-- Menampilkan status aktif -->
            <td>kosong</td>
            <td>kosong</td>
            <td>
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
        
    </table>
    
    
</div>
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus kursus ini?');
    }
</script>
@endsection