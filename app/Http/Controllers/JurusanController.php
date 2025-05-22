<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    //
public function index()
{
    $data_jurusan = Jurusan::all(); // Ambil semua data jurusan
    return view('admin.jurusan.index', [
        'menu' => 'jurusan',
        'data_jurusan' => $data_jurusan
    ]);
}

public function create()
{
    return view('admin.jurusan.create', [
        'menu' => 'jurusan'
    ]);
}

public function store(Request $request)
{
    $validasi = $request->validate([
        'nama_jurusan' => 'required|max:100|unique:jurusans,nama_jurusan',
        'kode_jurusan' => 'required|max:100|unique:jurusans,kode_jurusan',
    ]);

    Jurusan::create($validasi);

    return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan.');
}

public function edit($id)
{
    $jurusan = Jurusan::findOrFail($id);
    return view('admin.jurusan.edit', [
        'menu' => 'jurusan',
        'jurusan' => $jurusan
    ]);
}

public function update(Request $request, $id)
{
    $validasi = $request->validate([
        'nama_jurusan' => 'required|max:100|unique:jurusans,nama_jurusan,' . $id,
        'kode_jurusan' => 'required|max:20|unique:jurusans,kode_jurusan,' . $id,
    ]);

    $jurusan = Jurusan::findOrFail($id);
    $jurusan->update($validasi);

    return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diperbarui.');
}

public function destroy($id)
{
    $jurusan = Jurusan::findOrFail($id); // Cari data jurusan berdasarkan ID
    $jurusan->delete(); // Hapus data jurusan

    return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus.');
}
}
