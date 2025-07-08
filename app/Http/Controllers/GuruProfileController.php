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
    return view('guru_profiles.index', compact('data')); 
}

    public function create()
    {
        $users = User::all(); 
        return view('guru_profiles.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'nip' => 'required|unique:guru_profiles,nip',
            'mapel' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        GuruProfile::create([
            'user_id' => $request->user_id,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('guru_profiles.index')->with('success', 'Data guru berhasil ditambahkan!');
    }
     public function show($id)
    {
        $guru =  GuruProfile::findOrFail($id);
        $users = User::all();
        return view('guru_profiles.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = GuruProfile::findOrFail($id);
        $users = User::all();
        return view('guru_profiles.edit', compact('guru','users'));
    }

    public function update(Request $request, $id)
    {
        $guru = GuruProfile::findOrFail($id);

        $request->validate([
            'user_id' => 'required|numeric',
            'nip' => 'required|unique:guru_profiles,nip,' . $guru->id,
            'mapel' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        $guru->update([
            'user_id' => $request->user_id,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('guru_profiles.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        GuruProfile::findOrFail($id)->delete();
        return redirect()->route('guru_profiles.index')->with('success', 'Data guru berhasil dihapus!');
    }
}
