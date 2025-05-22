<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Tampilkan daftar semua pengguna.
     */
    public function index()
    {
        $user = User::all(); // Ambil semua data pengguna
        return view('admin.user.index', [
            'menu' => 'user',
            'title' => 'Data User',
            'user' => $user, // Kirim data pengguna ke view
        ]);
    }

    /**
     * Tampilkan form untuk menambahkan pengguna baru.
     */
    public function create()
    {
        return view('admin.user.create', [
            'menu' => 'user',
            'title' => 'Tambah Data Pengguna',
        ]);
    }

    /**
     * Simpan data pengguna baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:100|unique:users,username',
            'password' => 'required|confirmed', // Validasi konfirmasi password
            'status' => 'required|in:admin,guru,siswa', // Validasi status
        ]);

        // Simpan data pengguna
        User::create([
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']), // Enkripsi password
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail pengguna berdasarkan ID.
     */
    public function show($id)
    {
        $user = User::findOrFail($id); // Cari pengguna berdasarkan ID
        return view('admin.user.view', [
            'menu' => 'user',
            'title' => 'Detail Data Pengguna',
            'user' => $user,
        ]);
    }

    /**
     * Hapus pengguna berdasarkan ID.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Cari pengguna berdasarkan ID
        $user->delete(); // Hapus pengguna

        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}