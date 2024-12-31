<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    // Menampilkan daftar peserta
    public function index()
    {
        $participants = Participant::all();
        return view('participants.index', compact('participants'));
    }

    // Menampilkan form untuk menambah peserta
    public function create()
    {
        $participants = Participant::all(); // Ambil semua kursus
        return view('participants.create', compact('participants'));
        return redirect('participants.index')->with('success', 'Peserta berhasil ditambahkan!');;
    }

    // Menyimpan peserta baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
        ]);

        // Simpan peserta baru
        Participant::create($request->all());
        return redirect()->route('participants.index')->with('success', 'Peserta berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit peserta
    public function edit($id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.edit', compact('participant'));
    }

    // Memperbarui peserta
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email,' . $id,
        ]);

        // Temukan peserta dan perbarui datanya
        $participant = Participant::findOrFail($id);
        $participant->update($request->all());

        // Redirect ke halaman daftar peserta dengan pesan sukses
        return redirect()->route('participants.index')->with('success', 'Peserta berhasil diperbarui!');
    }

    // Menghapus peserta
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        // Redirect ke halaman daftar peserta dengan pesan sukses
        return redirect()->route('participants.index')->with('success', 'Peserta berhasil dihapus!');
    }

}