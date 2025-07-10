<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaProfile;
use App\Models\User;

class SiswaProfileController extends Controller
{
 public function index()
{
    $data = SiswaProfile::with('user')->get();
    return view('backend.siswa_profiles.index', compact('data')); 
}


 public function edit($id)
{
    $siswa = SiswaProfile::findOrFail($id);
    $users = User::all();
    return view('backend.siswa_profiles.edit', compact('siswa', 'users'));
}


    public function create()
    {
        $users = User::all(); 
        return view('backend.siswa_profiles.create', compact('users'));
    }

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|numeric',
        'nis' => 'required|unique:siswa_profiles,nis',
        'kelas' => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'telepon' => 'nullable|string|max:20',
    ]);

    SiswaProfile::create([
        'user_id' => $request->user_id,
        'nis' => $request->nis,
        'kelas' => $request->kelas,
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
    ]);

    return redirect()->route('backend.siswa_profiles.index')->with('success', 'Data siswa berhasil ditambahkan!');
}

 public function show($id)
    {
        $siswa =  SiswaProfile::findOrFail($id);
        $users = User::all();
        return view('backend.siswa_profiles.show', compact('siswa'));
    }


public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => 'required|numeric',
        'nis' => 'required|unique:siswa_profiles,nis,' . $id,
        'kelas' => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'telepon' => 'nullable|string|max:20',
    ]);

    $siswa = SiswaProfile::findOrFail($id);
    $siswa->update($request->all());

    return redirect()->route('backend.siswa_profiles.index')->with('success', 'Data siswa berhasil diupdate!');
}

public function destroy($id)
{
    $siswa = SiswaProfile::findOrFail($id);
    $siswa->delete();

    return redirect()->route('backend.siswa_profiles.index')->with('success', 'Data siswa berhasil dihapus!');
}

}
