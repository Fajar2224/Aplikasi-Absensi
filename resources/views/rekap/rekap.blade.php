@extends('templates siswa.layout')
@section('halaman_judul', 'Rekap Absensi')
@section('konten')
<form method="GET" class="mb-4">
    <div class="row g-2 align-items-end">
        <div class="col-md-3">
            <label class="form-label"><i class="fas fa-calendar-alt filter-icon"></i>Bulan</label>
            <select name="bulan" class="form-control">
                @for($i=1; $i<=12; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ $bulan == sprintf('%02d', $i) ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label"><i class="fas fa-calendar filter-icon"></i>Tahun</label>
            <select name="tahun" class="form-control">
                @for($y = date('Y')-2; $y <= date('Y'); $y++)
                    <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search me-1"></i>Tampilkan</button>
        </div>
    </div>
</form>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="d-flex align-items-center stat-card">
            <div class="stat-icon bg-success">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div>
                <div class="stat-title">Total Hadir</div>
                <div class="stat-value">
                    {{ $jumlahHadir ?? 0}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex align-items-center stat-card">
            <div class="stat-icon bg-warning">
                <i class="fas fa-car"></i>
            </div>
            <div>
                <div class="stat-title">Izin</div>
                <div class="stat-value">
                    {{ $jumlahSakit ?? 0}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex align-items-center stat-card">
            <div class="stat-icon bg-danger">
                <i class="fas fa-user-times"></i>
            </div>
            <div>
                <div class="stat-title">Alpa</div>
                <div class="stat-value">
                    {{ $jumlahAlfa ?? 0}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h5 class="m-0"><i class="fas fa-list-alt me-2"></i>Rekap Absensi {{ $siswa->nama }}</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="dataTable" width="90%" cellspacing="0">
                <thead class="text-center table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Status</th>
                        <th>Guru yang Mengabsen</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($rekapAbsensi->sortByDesc('tanggal') as $rekap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($rekap->tanggal)->format('d M Y') }}</td>
                        <td>{{ $rekap->jam }}</td>
                        <td>
                            @if(strtolower($rekap->status) == 'hadir')
                                <span class="badge bg-success">Hadir</span>
                            @elseif(strtolower($rekap->status) == 'izin')
                                <span class="badge bg-warning ">Izin</span>
                            @elseif(strtolower($rekap->status) == 'sakit')
                                <span class="badge bg-info ">Sakit</span>
                            @elseif(strtolower($rekap->status) == 'alpa')
                                <span class="badge bg-danger">Alpa</span>
                            @else
                                <span class="badge bg-secondary">{{ $rekap->status }}</span>
                            @endif
                        </td>
                        <td>{{ optional($rekap->guru)->nama ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-muted">Belum ada data absensi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection