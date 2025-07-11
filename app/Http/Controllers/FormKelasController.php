<?php

namespace App\Http\Controllers;

use App\Models\FormKelas;
use App\Models\GuruProfile;
use Illuminate\Http\Request;

class FormKelasController extends Controller
{
    // Tampilkan semua data form_kelas
    public function index()
    {
        $data = FormKelas::with('guru')->get();
        return view('backend.form_kelas.index', compact('data'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        $guru = GuruProfile::all();
        return view('backend.form_kelas.create', compact('guru'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru_profiles,id',
            'nama_form' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kelas' => 'required|string|max:50',
        ]);

        FormKelas::create($request->all());

        return redirect()->route('backend.form_kelas.index')->with('success', 'Form kelas berhasil ditambahkan!');
    }

    // Detail data (opsional)
    public function show($id)
    {
        $form_kelas = FormKelas::with('guru')->findOrFail($id);
       return view('backend.form_kelas.show', compact('form_kelas'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
      $form_kelas = FormKelas::findOrFail($id);
    $guruList = GuruProfile::all(); 

    return view('backend.form_kelas.edit', compact('form_kelas', 'guruList'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru_profiles,id',
            'nama_form' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kelas' => 'required|string|max:50',
        ]);

        $form = FormKelas::findOrFail($id);
        $form->update($request->all());

        return redirect()->route('backend.form_kelas.index')->with('success', 'Form kelas berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $form = FormKelas::findOrFail($id);
        $form->delete();

        return redirect()->route('backend.form_kelas.index')->with('success', 'Form kelas berhasil dihapus!');
    }
}
