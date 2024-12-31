<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        //$request->validate([
          //  'search' => 'nullable|string|max:255',
        //]);
        //$search = $request->input('search');
        $courses = Course::all();
        //$courses = Course::with('participants') // Eager load participants
        //->when($search, function ($query) use ($search) {
          //  return $query->where('title', 'like', "%{$search}%");
        //})
        //->paginate(10); 
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Validasi file
            'is_active' => 'required|boolean',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Kursus berhasil ditambahkan.');
    // Proses file jika ada
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('uploads', 'public'); // Simpan file
        $course->file = $filePath; // Simpan nama file
    }
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $course = Course::with('materials')->findOrFail($id); // Memuat materi terkait
        $materials = $course->materials; // Ambil materi terkait
        return view('courses.show', compact('course','materials'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Kursus berhasil dihapus.');
    }
}