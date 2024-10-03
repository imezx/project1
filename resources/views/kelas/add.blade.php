@extends('layouts.app')

@section('content')
    <h4>Tambah Kelas</h4>
    <hr>
    <div class="card">
        <form class="needs-validation" method="POST" action="{{ route('kelas.create') }}">
            @csrf
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="nama">Nama Kelas</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukan nama kelas">
                    @error('nama')
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
