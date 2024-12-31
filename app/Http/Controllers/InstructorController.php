<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    // Menampilkan daftar instruktur
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors'));
    }

    // Menampilkan form untuk menambah instruktur baru
    public function create()
    {
        return view('instructors.create');
    }

    // Menyimpan instruktur baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email',
        ]);

        Instructor::create($request->all());
        return redirect()->route('instructors.index')->with('success', 'Dosen created successfully.');
    }

    // Menampilkan detail instruktur
    public function show(Instructor $instructor)
    {
        return view('instructors.show', compact('instructor'));
    }

    // Menampilkan form untuk mengedit instruktur
    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    // Memperbarui instruktur
    public function update(Request $request, Instructor $instructor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->id,
        ]);

        $instructor->update($request->all());
        return redirect()->route('instructors.index')->with('success', 'Dosen updated successfully.');
    }

    // Menghapus instruktur
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructors.index')->with('success', 'Dosen deleted successfully.');
    }
    
}