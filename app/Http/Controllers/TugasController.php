<?php
namespace App\Http\Controllers;

use App\Models\FormKelas;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    // Menampilkan semua data tugas
    public function index()
    {
        $data = Tugas::with('form')->latest()->get();
        return view('backend.tugas.index', compact('data'));
    }

    // Menampilkan form tambah tugas
    public function create()
    {
        $form_kelas = FormKelas::all();
        return view('backend.tugas.create', compact('form_kelas'));
    }

    // Menyimpan data tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'form_id'   => 'required|exists:form_kelas,id',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kelas'     => 'required|string|max:100',
            'deadline'  => 'required|date',
        ]);

        Tugas::create($request->only(['form_id', 'judul', 'deskripsi', 'kelas', 'deadline']));

        return redirect()->route('backend.tugas.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // Menampilkan detail tugas
    public function show($id)
    {
        $tugas = Tugas::with('form')->findOrFail($id);
        return view('backend.tugas.show', compact('tugas'));
    }

    // Menampilkan form edit tugas
    public function edit($id)
    {
        $tugas      = Tugas::findOrFail($id);
        $form_kelas = FormKelas::all();
        return view('backend.tugas.edit', compact('tugas', 'form_kelas'));
    }

    // Mengupdate tugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'form_id'   => 'required|exists:form_kelas,id',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kelas'     => 'required|string|max:100',
            'deadline'  => 'required|date',
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->update($request->only(['form_id', 'judul', 'deskripsi', 'kelas', 'deadline']));

        return redirect()->route('backend.tugas.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    // Menghapus tugas
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();

        return redirect()->route('backend.tugas.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
