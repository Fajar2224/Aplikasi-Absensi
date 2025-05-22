@extends('templates guru.layout')
@section('halaman_judul', 'Mengabsen')
@section('konten')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-chalkboard"></i> Pilih Kelas</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('absen.create') }}" method="GET">
                        <div class="form-group mb-3">
                            <label for="kelas" class="fw-bold">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control form-select" onchange="if(this.value) window.location.href='/absen/mengabsen/' + this.value;">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $kelas_terpilih == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-search"></i> Pilih
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection