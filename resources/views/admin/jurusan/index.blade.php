@extends('templates admin.layout')
@section('halaman_judul', 'Data Jurusan')
@section('konten')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Manajemen Data Jurusan</h5>
                <a href="{{ route('jurusan.create') }}" class="btn btn-success float-right">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jurusan</th>
                                <th>Kode Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_jurusan as $jurusan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jurusan->nama_jurusan }}</td>
                                <td>{{ $jurusan->kode_jurusan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('jurusan.show', $jurusan->id) }}" class="btn btn-info btn-circle" title="Lihat Data Jurusan">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-circle" title="Edit Data Jurusan">
                                        <i class="fas fa-wrench"></i>
                                    </a>
                                    <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-circle" title="Hapus Data Jurusan" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-secondary float-right">
                        <i class="fas fa-arrow-circle-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection