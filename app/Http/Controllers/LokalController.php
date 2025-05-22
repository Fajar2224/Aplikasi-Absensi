<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\Lokal;
use App\Models\jurusan;
use Illuminate\Http\Request;

class LokalController extends Controller
{
    //
    public function index()
{
    $data_kelas = Lokal::with('guru')->get(); // Ambil data kelas beserta relasi guru
    return view('admin.lokal.index', [
        'menu' => 'lokal',
        'data_kelas' => $data_kelas
    ]);
}

    public function create()
{
    $jurusan = Jurusan::all(); // Ambil semua data jurusan
    $guru = guru::all(); // Ambil semua data guru
    return view('admin.lokal.create', [
        'menu' => 'lokal',
        'jurusan' => $jurusan, // Kirim data jurusan ke view
        'guru' => $guru // Kirim data guru ke view
    ]);
}
public function show($id)
{
    $lokal = Lokal::with(['jurusan', 'guru'])->findOrFail($id); // Ambil data kelas beserta relasi jurusan dan guru
    return view('admin.lokal.show', [
        'menu' => 'lokal',
        'lokal' => $lokal
    ]);
}

    public function store(Request $request)
    {
       $validasi=$request->validate([
        "nama_kelas"=>"required",
        "jurusans_id"=>"required",
        "gurus_id"=>"required"
       ]);
       $data_baru=New Lokal();
       $data_baru->nama_kelas=$validasi['nama_kelas'];
       $data_baru->jurusans_id=$validasi['jurusans_id'];
       $data_baru->gurus_id=$validasi['gurus_id'];
       $data_baru->save();
       
       return redirect(route('lokal.index'));
    }

    public function edit($a_id)
{
    $lokal = Lokal::findOrFail($a_id);
    $jurusan = Jurusan::all();
    $guru = Guru::all();
    return view('admin.lokal.edit', [
        'menu' => 'lokal',
        'lokal' => $lokal,
        'jurusan' => $jurusan,
        'guru' => $guru
    ]);
}

public function update(Request $request, $id)
{
    $validasi = $request->validate([
        'NIP' => 'required|unique:gurus,NIP,' . $id,
        'nama' => 'required|max:100',
        'alamat' => 'required|max:255',
        'no_telp' => 'required|numeric|digits_between:10,15',
        'mapel' => 'required|max:50',
    ]);

    $guru = Guru::findOrFail($id);
    $guru->update($validasi);

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
}
    public function destroy($a_id)
    {
        $data_kelas=Lokal::find($a_id);
        $data_kelas->delete();
        return redirect(route('lokal.index'));
    }

}
