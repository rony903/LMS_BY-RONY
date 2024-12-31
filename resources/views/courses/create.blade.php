@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kursus</h1>
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea class="form-control" name="description" rows="5" required></textarea>
    </div>
        <div class="form-group">
            <label for="is_active">Aktif</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>
    <div class="form-group">
            <label for="file">Unggah File</label>
            <input type="file" class="form-control" name="file" accept="application/pdf,image/*">
        </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
</div>
@endsection

