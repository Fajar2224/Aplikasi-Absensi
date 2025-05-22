@extends('templates admin.layout')

@section('halaman_judul', 'Data Guru')

@section('konten')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Guru</h5>
               <a href="{{ route('guru.create') }}" class="btn btn-success float-right">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Mata Pelajaran</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($gurus as $guru)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $guru->NIP }}</td>
                                <td>{{ $guru->nama }}</td>
                                <td>{{ $guru->alamat }}</td>
                                <td>{{ $guru->no_telp }}</td>
                               <td>{{ $guru->mapel->nama_mapel ?? '-' }}</td>
                                <td>{{ $guru->user->username ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection