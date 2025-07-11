<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TugasProjekAkhir;
use App\Models\User;
use Illuminate\Http\Request;

class TugasProjekAkhirController extends Controller
{
    public function index()
    {
        $projects = TugasProjekAkhir::with('pembimbing')->latest()->get();
        return view('backend.tugas_projek_akhir.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        return view('backend.tugas_projek_akhir.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'pembimbing_id' => 'required|exists:users,id',
            'deadline'      => 'required|date',
            'status'        => 'required|in:perencanaan,berjalan,presentasi,selesai',
        ]);

        TugasProjekAkhir::create($request->all());

        return redirect()->route('backend.tugas_projek_akhir.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(TugasProjekAkhir $tugasprojekakhir)
    {
        $users = User::all();
        return view('backend.tugas_projek_akhir.edit', compact('tugasprojekakhir', 'users'));
    }

    public function update(Request $request, TugasProjekAkhir $tugasprojekakhir)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'pembimbing_id' => 'required|exists:users,id',
            'deadline'      => 'required|date',
            'status'        => 'required|in:perencanaan,berjalan,presentasi,selesai',
        ]);

        $tugasprojekakhir->update($request->all());

        return redirect()->route('backend.tugas_projek_akhir.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(TugasProjekAkhir $tugasprojekakhir)
    {
        $tugasprojekakhir->delete();

        return redirect()->route('backend.tugas_projek_akhir.index')->with('success', 'Data berhasil dihapus');
    }
}
