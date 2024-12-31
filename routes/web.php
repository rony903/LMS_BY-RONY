<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\InstructorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Rute untuk resource
Route::resource('courses', CourseController::class);

// Rute untuk menampilkan daftar kursus
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// Rute untuk menampilkan formulir pembuatan kursus
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

// Rute untuk menyimpan kursus baru
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Rute untuk menampilkan detail kursus
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//tes
Route::resource('materials', MaterialController::class);

// Rute untuk menampilkan daftar materi
Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');

// Rute untuk menampilkan form tambah materi
Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');


// Rute untuk menyimpan materi baru
Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');

// Rute untuk menampilkan form edit materi
Route::get('/materials/{id}/edit', [MaterialController::class, 'edit'])->name('materials.edit');

// Rute untuk mengupdate materi
Route::put('/materials/{id}', [MaterialController::class, 'update'])->name('materials.update');

// Rute untuk menampilkan detail materi
Route::get('/materials/{id}', [MaterialController::class, 'show'])->name('materials.show');

// Rute untuk menghapus materi
Route::delete('/materials/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute untuk menampilkan form tambah peserta
Route::get('/participants/create', [ParticipantController::class, 'create'])->name('participants.create');
// Rute untuk menyimpan peserta
Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');

// Rute untuk menampilkan form tambah dosen
Route::get('/instructors/create', [InstructorController::class, 'create'])->name('instructors.create');
// Rute untuk menyimpan dosen
Route::post('/instructors', [InstructorController::class, 'store'])->name('instructors.store');

// Rute untuk dashboard peserta aktif
Route::get('/participants', [ParticipantController::class, 'index'])->name('participants.index');

// Rute untuk dashboard dosen aktif
Route::get('/instructors', [InstructorController::class, 'index'])->name('instructors.index');

// Rute menampilkan peserta
Route::resource('participants', ParticipantController::class);

Route::get('instructors/{instructor}/edit', [InstructorController::class, 'edit'])->name('instructors.edit');
Route::delete('instructors/{instructor}', [InstructorController::class, 'destroy'])->name('instructors.destroy');
Route::put('instructors/{instructor}', [InstructorController::class, 'update'])->name('instructors.update');