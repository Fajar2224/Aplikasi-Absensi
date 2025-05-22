<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\absen;
use App\Models\lokal;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\mengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_siswa = Siswa::count();
        $jumlah_guru = Guru::count();
        $jumlah_jurusan = Jurusan::count();

        return view('index', [
            'jumlah_siswa' => $jumlah_siswa,
            'jumlah_guru' => $jumlah_guru,
            'jumlah_jurusan' => $jumlah_jurusan,
        ]);
    }
    public function dashboardGuru()
    {
        $jumlah_siswa = Siswa::count(); // Hitung total siswa
        $jumlah_guru = Guru::count(); // Hitung total guru
        $jumlah_lokal = Lokal::count(); // Hitung total kelas
        $jumla_jurusan = Jurusan::count(); // Hitung total jurusan
        $jumlah_mengajar = mengajar::count(); // Hitung guru yang mengajar
        $jumlah_absen = Absen::count(); // Hitung total absen siswa

        return view('dashboardGuru', [
            'jumlah_siswa' => $jumlah_siswa,
            'jumlah_guru' => $jumlah_guru,
            'jumlah_lokal' => $jumlah_lokal,
            'jumla_jurusan' => $jumla_jurusan,
            'jumlah_mengajar' => $jumlah_mengajar,
            'jumlah_absen' => $jumlah_absen,
        ]);
    }
    public function dashboardSiswa()
{
    $user = Auth::user();
    $siswa = \App\Models\Siswa::where('users_id', $user->id)->first();

    // Data yang ingin ditampilkan di dashboard siswa
    $jumlah_absen = \App\Models\Absen::where('siswas_id', $siswa->id)->count();
    $jumlah_hadir = \App\Models\Absen::where('siswas_id', $siswa->id)->where('status', 'hadir')->count();
    $jumlah_sakit = \App\Models\Absen::where('siswas_id', $siswa->id)->where('status', 'sakit')->count();
    $jumlah_alfa  = \App\Models\Absen::where('siswas_id', $siswa->id)->where('status', 'alfa')->count();

    return view('dashboardSiswa', [
        'siswa' => $siswa,
        'jumlah_absen' => $jumlah_absen,
        'jumlah_hadir' => $jumlah_hadir,
        'jumlah_sakit' => $jumlah_sakit,
        'jumlah_alfa' => $jumlah_alfa,
    ]);
}
}
