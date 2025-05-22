<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\guru;
use App\Models\absen;
use App\Models\lokal;
use App\Models\siswa;
use App\Models\mengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    //
    public function index(Request $request)
{
    $query = absen::with(['siswa.lokal', 'guru']);
    $kelas = lokal::all();
    $kelas_terpilih = null;

    if ($request->has('kelas') && $request->kelas != '') {
        $kelas_terpilih = $request->kelas;
        $query->whereHas('siswa', function ($q) use ($request) {
            $q->where('lokals_id', $request->kelas);
        });
    }

    if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
        $query->whereDate('tanggal', $request->tanggal_absen);
    }

    $dataabsen = $query->get();

    return view('absen.index', [
        'menu' => 'absen',
        'title' => 'Data Absen',
        'dataabsen' => $dataabsen,
        'kelas' => $kelas,
        'kelas_terpilih' => $kelas_terpilih // <-- tambahkan ini
    ]);
}
   public function mengabsen(Request $request, $lokals_id)
{
    $kelas = \App\Models\lokal::all();
    // Ambil siswa berdasarkan kelas yang dipilih (lokals_id)
    $datasiswa = \App\Models\siswa::where('lokals_id', $lokals_id)->get();

    return view('absen.mengabsen', [
        'menu' => 'absen',
        'title' => 'Absen Siswa',
        'kelas' => $kelas,
        'datasiswa' => $datasiswa,
        'kelas_terpilih' => $lokals_id // opsional, untuk menandai kelas yang dipilih di view
    ]);
}
  public function store(Request $request)
    {
        // Implementasi penyimpanan data absen
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,sakit,alfa',
        ]);

        $statuses = $request->input('status', []);
        $currentDate = now()->toDateString();
        $currentTime = now()->toTimeString();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();
        $guru = \App\Models\Guru::where('users_id', $user->id)->first();
        if (!$guru) {
            return redirect()->back()->with('error', 'Data guru tidak ditemukan untuk user ini.');
        }

        $mapel_id = $guru->mapels_id; // Ambil id mapel dari guru

        foreach ($statuses as $id => $status) {
            \App\Models\Absen::create([
                'tanggal'   => $currentDate,
                'jam'       => $currentTime,
                'status'    => $status,
                'gurus_id'  => $guru->id,
                'siswas_id' => $id,
            ]);
        }

        // Tambahkan proses insert ke tabel mengajars
        if ($mapel_id) {
            \App\Models\mengajar::firstOrCreate([
                'gurus_id'  => $guru->id,
                'mapels_id' => $mapel_id,
            ]);
        }

        return redirect()->route('absen.index')->with('success', 'Status absen siswa & data mengajar berhasil disimpan.');
    }

   public function create(Request $request)
{
    $kelas = \App\Models\lokal::all();
    $datasiswa = collect();
    if ($request->has('kelas') && $request->kelas != '') {
        $datasiswa = \App\Models\siswa::where('lokals_id', $request->kelas)->get();
    }
    return view('absen.create', [
        'kelas' => $kelas,
        'datasiswa' => $datasiswa,
        'kelas_terpilih' => $request->kelas ?? null
    ]);
}
    public function rekap()
{
    // Ambil data rekap absen sesuai kebutuhan
    return view('absen.rekap');
}

public function show($id)
{
    $siswa = \App\Models\Siswa::findOrFail($id);

    $bulan = request('bulan', date('m'));
    $tahun = request('tahun', date('Y'));

    $rekapAbsensi = \App\Models\Absen::where('siswas_id', $id)
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->with('guru')
        ->get();

    $jumlahHadir = $rekapAbsensi->where('status', 'hadir')->count();
    $jumlahSakit = $rekapAbsensi->whereIn('status', ['izin', 'sakit'])->count();
    $jumlahAlfa  = $rekapAbsensi->where('status', 'alpa')->count();

    return view('absen.rekap', [
        'siswa' => $siswa,
        'rekapAbsensi' => $rekapAbsensi,
        'jumlahHadir' => $jumlahHadir,
        'jumlahSakit' => $jumlahSakit,
        'jumlahAlfa' => $jumlahAlfa,
        'bulan' => $bulan,
        'tahun' => $tahun,
    ]);
}
}
