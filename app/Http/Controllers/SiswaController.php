<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lokal;
use App\Models\siswa;
use App\Models\jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $data_siswa = Siswa::with('user','lokal','jurusan')->get(); 
        return view('admin.siswa.index', [
            'menu' => 'siswa',
            'data_siswa' => $data_siswa
        ]);
    }
    public function create()
    {
        $kelas = Lokal::all(); 
        $jurusan = Jurusan::all();
        return view('admin.siswa.create', [
            'menu' => 'siswa',
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }
    public function show($id)
{
    $siswa = Siswa::with(['jurusan',])->findOrFail($id); 
    return view('admin.siswa.show', [
        'menu' => 'siswa',
        'siswa' => $siswa
    ]);
}
     public function store(Request $request)
    {
        
        $validasi = $request->validate([
            'NISN' => 'required',
            'nama' => 'required',
            'no_telp' => 'required|max:13',
            'jurusans_id' => 'required',
            'alamat' => 'required|max:255',
            'username' => 'required',
            'password' => 'required',
            'lokals_id' => 'required',
           
        ], [
            'NISN.required' => 'NISN harus diisi',
            'nama.required' => 'Nama harus diisi',
            'no_telp.required' => 'No Telepon harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'lokals_id.required' => 'Lokal harus diisi',


        ]);

        $user = new User;
        $user->username = $validasi['username'];
        $user->password = bcrypt($validasi['password']);
        $user->status = 'siswa'; // Set  user sebagai siswa
        $user->save();

        $siswa = new siswa;
        $siswa->NISN = $validasi['NISN'];
        $siswa->nama = $validasi['nama'];
        $siswa->no_telp = $validasi['no_telp'];
        $siswa->jurusans_id = $validasi['jurusans_id'];
        $siswa->alamat = $validasi['alamat'];
        $siswa->username = $validasi['username'];
        $siswa->password = bcrypt($validasi['password']);
        $siswa->lokals_id = $validasi['lokals_id'];
        $siswa->users_id = $user->id; // Ambil ID user yang baru saja dibuat

        $siswa->save();

        return redirect(route('siswa.index'));
    }
    public function edit($id)
{
    $siswa = Siswa::findOrFail($id);
    $jurusan = Jurusan::all();
    return view('admin.siswa.edit', [
        'menu' => 'siswa',
        'siswa' => $siswa,
        'jurusan' => $jurusan
    ]);
}

public function update(Request $request, $id)
{
    $validasi = $request->validate([
        'nama' => 'required|max:100',
        'alamat' => 'required|max:255',
        'no_telp' => 'required|numeric|digits_between:10,15',
        'jurusans_id' => 'required|exists:jurusans,id',
        
    ]);

    $siswa = Siswa::findOrFail($id);
    $siswa->update($validasi);

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
}
    public function destroy($a_id)
    {
        $data_siswa=Siswa::find($a_id);
        $data_siswa->delete();
        return redirect(route('siswa.index'));
    }

}
