@extends('layouts.app')

@section('content')
    <h4>Tambah Siswa</h4>
    <hr>
    <div class="card">
        <form class="needs-validation" method="POST" action="{{ route('siswa.create') }}">
            @csrf
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukan nama">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="Masukan NISN">
                    @error('nisn')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" class="form-control">
                        <option>Pilih Kelas</option>
                        @foreach ($kelas as $obj)
                            <option value="{{ $obj->id }}">{{ $obj->nama }}</option>
                        @endforeach
                    </select>
                    @error('kelas')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-flat btn-outline-primary mb-3 w-100">Submit</button>
                <a href="{{ route('home.index') }}" class="btn btn-flat btn-outline-dark w-100">Kembali</a>
            </div>
        </form>
    </div>
@endsection
