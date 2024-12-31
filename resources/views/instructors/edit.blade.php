@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Dosen</h1>
    <form action="{{ route('instructors.update', $instructor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $instructor->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $instructor->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection