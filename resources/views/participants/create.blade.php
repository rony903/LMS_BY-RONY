@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Peserta</h1>

    <form action="{{ route('participants.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Peserta</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email Peserta</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Peserta</button>
        <a href="{{ route('participants.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection