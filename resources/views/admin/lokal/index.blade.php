@extends('templates admin.layout')
@section('halaman_judul','Data Kelas')
@section('konten')
<div class="row mt-5">
    <div class="col">
  <div class="card">
    <div class="card-header">
<h5>Manajemen Data Kelas</h5>
<a href="{{ route('lokal.create') }}" class="btn btn-success float-right" ><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
<div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                        <th>no</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                                   @foreach($data_kelas as $dk)
                                   <td>{{$loop->iteration}}</td>
                                   <td>{{$dk->nama_kelas}}</td>
                                   <td>{{ $dk->guru->nama ?? 'Tidak Ada Guru' }}</td> <!-- Tampilkan nama guru -->
                                   <td class="text-center">
                                    <a href="{{route('lokal.show',$dk->id)}}" class="btn btn-info btn-circle"title="edit data kelas">
                                   <i class="fas fa-eye"></i></a>
                                   <a href="{{route('lokal.edit',$dk->id)}}" class="btn btn-warning btn-circle"title="edit data kelas">
                                   <i class="fas fa-wrench"></i>
                                    </a>
                                    <form action="{{route('lokal.hapus',$dk['id'])}}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-circle" title="hapus data kelas">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                   </tr> @endforeach
                      </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-secondary float-right" ><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endsection