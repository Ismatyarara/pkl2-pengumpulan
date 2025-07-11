<?php

namespace App\Http\Controllers;

use App\Models\GuruProfile;
use App\Models\User;
use Illuminate\Http\Request;

class GuruProfileController extends Controller
{
    public function index()
    {
        $data = GuruProfile::with('user')->get();
        return view('backend.guru_profiles.index', compact('data')); 
    }

    public function create()
    {
        $users = User::all(); 
        return view('backend.guru_profiles.create', compact('users'));
    }

 public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'nama'     => 'required|string|max:50|unique:guru_profiles,nama',
        'mapel'   => 'required|string|max:100',
        'telepon' => 'nullable|string|max:20',
        'alamat'  => 'nullable|string|max:255',
    ]);

    GuruProfile::create($request->all());

    return redirect()->route('backend.guru_profiles.index')->with('success', 'Data guru berhasil ditambahkan.');
}

    public function show($id)
    {
        $guru = GuruProfile::with('user')->findOrFail($id);
        return view('backend.guru_profiles.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = GuruProfile::findOrFail($id);
        $users = User::all();
        return view('backend.guru_profiles.edit', compact('guru', 'users'));
    }

   public function update(Request $request, $id)
{
    $guru = GuruProfile::findOrFail($id);

    $request->validate([
        'user_id' => 'required|numeric',
        'nama' => 'required|unique:guru_profiles,nama,' . $guru->id,
        'mapel' => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'telepon' => 'nullable|string|max:20',
    ]);

    $guru->update([
        'user_id' => $request->user_id,
        'nama' => $request->nama,
        'mapel' => $request->mapel,
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
    ]);

    return redirect()->route('backend.guru_profiles.index')->with('success', 'Data guru berhasil diperbarui!');
}

    public function destroy($id)
    {
        GuruProfile::findOrFail($id)->delete();
        return redirect()->route('backend.guru_profiles.index')->with('success', 'Data guru berhasil dihapus!');
    }
}
