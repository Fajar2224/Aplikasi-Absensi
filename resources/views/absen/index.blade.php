@extends('templates guru.layout')
@section('halaman_judul', 'Mengabsen')
@section('konten')

<div class="card">
    <h5 class="card-header">Management Data Absen</h5>
    <div class="card-body">
        
        <a href="{{ route('absen.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Absen</a>
    <div class="card-body">
        <form method="GET" action="{{ route('absen.index') }}">
            <div class="row">
                <div class="col-md-4">
        
                    <select name="kelas" id="kelas" class="form-control form-select">
                        <option value="">Semua Kelas</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}" {{ $kelas_terpilih == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="date" name="tanggal_absen" class="form-control" value="{{ request('tanggal_absen') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="table-responsive text-nowrap">
        <table id="dataTable" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Tanggal Absen</th>
                    <th>Jam Absen</th>
                    <th>Guru yang Mengabsen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                
    @foreach($dataabsen->sortByDesc('tanggal') as $da)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$da->siswa->nama ?? '-'}}</td>
        <td>{{$da->siswa->lokal->nama_kelas ?? '-'}}</td>
        <td>{{$da->status ?? '-'}}</td>
        <td>{{$da->tanggal ?? '-'}}</td>
        <td>{{$da->jam ?? '-'}}</td>
        <td>{{$da->guru->nama ?? '-'}}</td>
        <td>
            <a href="{{ route('absen.edit', $da->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection