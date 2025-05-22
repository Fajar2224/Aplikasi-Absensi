
@extends('templates admin.layout')
@section('halaman_judul', 'Data Siswa')
@section('konten')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Manajemen Data Siswa</h5>
                <a href="{{ route('siswa.create') }}" class="btn btn-success float-right">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_siswa as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->NISN }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->lokal->nama_kelas ?? 'Tidak Ada Kelas' }}</td> <!-- Menampilkan nama kelas -->
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->no_telp }}</td>
                                <td>{{ $siswa->jurusan->nama_jurusan ?? 'Tidak Ada Jurusan' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-info btn-circle" title="Lihat Data Siswa">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-circle" title="Edit Data Siswa">
                                        <i class="fas fa-wrench"></i>
                                    </a>
                                    <form action="{{ route('siswa.hapus', $siswa->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-circle" title="Hapus Data Siswa">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-secondary float-right" ><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection