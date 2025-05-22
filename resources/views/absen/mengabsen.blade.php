@extends('templates guru.layout')
@section('halaman_judul', 'Mengabsen')
@section('konten')
<div class="container mt-5">
    <div class="table-responsive text-nowrap">
        <form action="{{ route('absen.updateStatus') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Alfa</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($datasiswa as $dg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dg->nama }}</td>
                        <td>{{ $dg->lokal->nama_kelas }}</td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="hadir" class="select-hadir">
                        </td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="sakit" class="select-sakit">
                        </td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="alfa" class="select-alfa">
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada siswa di kelas ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-sm-10 text-left ms-auto">
                    <a href="{{ route('absen.index') }}" class="btn btn-success btn-custom-width mb-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="col-sm-2 text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection