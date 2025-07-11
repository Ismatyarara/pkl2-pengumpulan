<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProyekAnggota;
use App\Models\TugasProjekAkhir;
use App\Models\User;
use Illuminate\Http\Request;

class ProyekAnggotaController extends Controller
{
    public function index()
    {
        $data = ProyekAnggota::with(['proyek', 'murid'])->latest()->get();
        return view(' backend.proyek_anggota.index', compact('data'));
    }

    public function create()
    {
        $projek = TugasProjekAkhir::all();
        $murid  = User::where('role', 'siswa')->get();

        return view(' backend.proyek_anggota.create', compact('projek', 'murid'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:tugas_projek_akhirs,id',
            'murid_id'  => 'required|exists:users,id',
            'peran'     => 'nullable|string|max:100',
        ]);

        ProyekAnggota::create($request->all());

        return redirect()->route('backend.proyek_anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(ProyekAnggota $proyekanggota)
    {
        $projek = TugasProjekAkhir::all();
        $murid  = User::where('role', 'siswa')->get();

        return view('backend.proyek_anggota.edit', compact('proyekanggota', 'projek', 'murid'));
    }

    public function update(Request $request, ProyekAnggota $proyekanggota)
    {
        $request->validate([
            'proyek_id' => 'required|exists:tugas_projek_akhirs,id',
            'murid_id'  => 'required|exists:users,id',
            'peran'     => 'nullable|string|max:100',
        ]);

        $proyekanggota->update($request->all());

        return redirect()->route('backend.proyek_anggota.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(ProyekAnggota $proyekanggota)
    {
        $proyekanggota->delete();

        return redirect()->route('backend.proyek_anggota.index')->with('success', 'Data berhasil dihapus.');
    }
}
