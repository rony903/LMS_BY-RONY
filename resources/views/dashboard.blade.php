@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Dashboard</h1>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-4">
                <div class="card-header">Total Kursus</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCourses }}</h5>
                    <p class="card-text">Jumlah keseluruhan kursus yang tersedia.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-success mb-4">
                <div class="card-header">Kursus Aktif</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $activeCourses }}</h5>
                    <p class="card-text">Jumlah kursus yang sedang aktif.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-4">
                <div class="card-header">Kursus Tidak Aktif</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $inactiveCourses }}</h5>
                    <p class="card-text">Jumlah kursus yang tidak aktif.</p>
                </div>
            </div>
        </div>
    </div>

<div class="row">
        <div class="col-md-4">
            <h2>Data Peserta</h2>
            <p>Kelola peserta kursus Anda.</p>
            <a href="{{ route('participants.index') }}" class="btn btn-primary">Lihat Peserta Aktif</a>
            <a href="{{ route('participants.create') }}" class="btn btn-secondary">Tambah Peserta</a>
        </div>

        <div class="col-md-4">
            <h2>Data Dosen</h2>
            <p>Kelola dosen kursus Anda.</p>
            <a href="{{ route('instructors.index') }}" class="btn btn-primary">Lihat Dosen Aktif</a>
            <a href="{{ route('instructors.create') }}" class="btn btn-secondary">Tambah Dosen</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kursus Terbaru</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentCourses as $index => $course)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- ID akan ditampilkan berurutan -->
                                    <td>{{ $course->title }}</td>
                                    <td>{{ Str::limit($course->description, 50) }}</td>
                                    <td>{{ $course->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection