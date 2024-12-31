@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Peserta</h1>

    <form action="{{ route('participants.update', $participant->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nama Peserta</label>
            <input type="text" name="name" class="form-control" value="{{ $participant->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email Peserta</label>
            <input type="email" name="email" class="form-control" value="{{ $participant->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Peserta</button>
        <a href="{{ route('participants.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection