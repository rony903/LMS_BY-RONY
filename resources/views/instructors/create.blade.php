@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Dosen</h1>
    <form action="{{ route('instructors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection