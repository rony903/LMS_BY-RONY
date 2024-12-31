<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total kursus
        $totalCourses = Course::count();

        // Menghitung kursus aktif
        $activeCourses = Course::where('is_active', true)->count();

        // Menghitung kursus tidak aktif
        $inactiveCourses = Course::where('is_active', false)->count();

        // Mengambil 5 kursus terbaru
        $recentCourses = Course::orderBy('created_at', 'desc')->take(5)->get();

        // Mengembalikan tampilan dashboard dengan data yang diperlukan
        return view('dashboard', compact('totalCourses', 'activeCourses', 'inactiveCourses', 'recentCourses'));
    }
}