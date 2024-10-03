@extends('layouts.app')

@section('content')
    <h4>Detail Siswa - {{ $siswa->nama }}</h4>
    <hr>
    <div class="row">
        <div class="card card-body">
            <h5>Informasi Siswa</h5>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">Nama: </span>
                    <input type="text" class="form-control" value="{{ $siswa->nama }}" disabled>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">NISN: </span>
                    <input type="text" class="form-control" value="{{ $siswa->nisn }}" disabled>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">Kelas: </span>
                    <input type="text" class="form-control" value="{{ $siswa->getKelas->nama }}" disabled>
                </div>
            </div>
            <h5>Kehadiran Siswa</h5>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Total (%): </span>
                        <label class="form-control">{{ $siswa->getTotalKehadiranPersentase() }}</label>
                    </div>
                    <div class="form-text"><i>Total (%) di ambil dari total kehadiran kecuali alpha.</i></div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Total Kehadiran: </span>
                        <label class="form-control">{{ $siswa->getAllExcept(4) . " of " . $siswa->getTotalKehadiran() }}</label>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Hadir: </span>
                        <label class="form-control">{{ $siswa->getTotalBy(1) }}</label>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Izin: </span>
                        <label class="form-control">{{ $siswa->getTotalBy(2) }}</label>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Sakit: </span>
                        <label class="form-control">{{ $siswa->getTotalBy(3) }}</label>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="input-group">
                        <span class="input-group-text">Alpha: </span>
                        <label class="form-control">{{ $siswa->getTotalBy(4) }}</label>
                    </div>
                </div>
            </div>
            <hr>
            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-flat btn-outline-primary w-100 mt-2">Edit Data</a>
            <a href="{{ route('home.index') }}" class="btn btn-flat btn-outline-dark w-100 mt-2">Ok</a>
        </div>
    </div>
@endsection
