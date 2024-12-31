<?php
namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use Illuminate\Http\Request;


class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('course')->get();
        $courses = Course::all(); // Ambil semua kursus
        return view('materials.index', compact('materials','courses'));
    }

    public function create()
    {
        $courses = Course::all(); // Ambil semua kursus
        return view('materials.create', compact('courses'));
    }
    

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'course_id' => 'required|exists:courses,id',
    ]);

    Material::create($request->all());
    
    // Menambahkan notifikasi
    //return redirect()->route('materials.index')->with('success', 'Materi berhasil ditambahkan.');
    return redirect()->route('courses.show', $request->course_id)
    ->with('success', 'Materi berhasil ditambahkan!');
}
   
    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('materials.show', compact('material'));
    }

    public function edit($id)
    {
    $material = Material::findOrFail($id);
    $courses = Course::all(); // Ambil semua kursus
    return view('materials.edit', compact('material', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $material = Material::findOrFail($id);
        $material->update($request->all());
        //return redirect()->route('materials.index')->with('success', 'Materi berhasil diperbarui.');
        return redirect()->route('courses.show', $material->course_id)
                     ->with('success', 'Materi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $courseId = $material->course_id; // Ambil ID kursus dari materi
        $material->delete(); // Hapus materi

        return redirect()->route('courses.show', $courseId) // Arahkan ke detail kursus
                        ->with('success', 'Materi berhasil dihapus.');
    }
}