@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Peserta Aktif</h1>
    
    <!-- Tombol untuk menambah peserta -->
    <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Tambah Peserta</a>

    <!-- Tabel Daftar Peserta -->
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
            @foreach($participants as $index => $participant)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->email }}</td>
                <td>
                    <!-- Aksi Edit dan Hapus -->
                    <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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