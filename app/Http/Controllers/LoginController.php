<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Proses autentikasi pengguna.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        // Validasi input login
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba autentikasi pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Cek role pengguna dan arahkan ke dashboard yang sesuai
            if ($user->status === 'admin') {
                return redirect()->route('home'); // Dashboard admin
            }

            if ($user->status === 'guru') {
                $guru = Guru::where('users_id', $user->id)->first();
                if ($guru) {
                    return redirect()->route('dashboardguru'); // Dashboard guru
                }
            }

            if ($user->status === 'siswa') {
                $siswa = Siswa::where('users_id', $user->id)->first();
                if ($siswa) {
                    return redirect()->route('dashboardsiswa'); // Dashboard siswa
                }
            }

            // Jika role tidak dikenali
            Auth::logout();
            return redirect()->back()->with('loginError', 'Role tidak dikenali');
        }

        // Jika autentikasi gagal
        return back()->with('loginError', 'Login gagal, silakan coba lagi.');
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}