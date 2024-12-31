@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Dosen</h1>
    <a href="{{ route('instructors.create') }}" class="btn btn-primary">Tambah Dosen</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instructors as $index => $instructor)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $instructor->name }}</td>
                    <td>{{ $instructor->email }}</td>
                    <td>
                        <a href="{{ route('instructors.edit', $instructor) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('instructors.destroy', $instructor) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
@endsection