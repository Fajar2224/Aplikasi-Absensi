<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with('user','mapel')->get(); // Ambil semua data guru beserta relasi user
        return view('admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data Guru',
            'gurus' => $gurus,
        ]);
    }

    public function create()
    {
        $mapel = \App\Models\mapel::all();
        return view('admin.guru.create', compact('mapel'));
    }


    public function store(Request $request)
    {
        $validasi = $request->validate([
            'NIP' => 'required',
            'nama' => 'required|max:100',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric|digits_between:10,15',
            'mapels_id' => 'required|exists:mapels,id', // relasi ke tabel mapel
            'username' => 'required|max:100',
            'password' => 'required|confirmed',
        ]);

        // Simpan data ke tabel users
        $user = User::create([
            'username' => $validasi['username'],
            'password' => bcrypt($validasi['password']),
            'status' => 'guru',
        ]);

        // Simpan data ke tabel gurus
        Guru::create([
            'NIP' => $validasi['NIP'],
            'nama' => $validasi['nama'],
            'alamat' => $validasi['alamat'],
            'no_telp' => $validasi['no_telp'],
            'mapels_id' => $validasi['mapels_id'], // simpan id mapel
            'users_id' => $user->id,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }
    public function show($id)
{
    $guru = Guru::findOrFail($id); // Ambil data guru berdasarkan ID
    return view('admin.guru.show', [
        'menu' => 'guru',
        'guru' => $guru
    ]);
}

public function edit($id)
{
    $guru = Guru::findOrFail($id);
    return view('admin.guru.edit', [
        'menu' => 'guru',
        'guru' => $guru
    ]);
}

   public function update(Request $request, $id)
{
    $validasi = $request->validate([
        'nama' => 'required|max:100',
        'alamat' => 'required|max:255',
        'no_telp' => 'required|numeric|digits_between:10,15',
        'mapel' => 'required|max:50',
    ]);

    $guru = Guru::findOrFail($id);
    $guru->update($validasi);

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
}

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete(); // Hapus data guru
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}