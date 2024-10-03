@extends('layouts.app')

@section('content')
    <h4>Input Absensi</h4>
    <hr>
    <div class="card">
        <form class="needs-validation" method="POST" action="{{ route('absensi.precreate') }}">
            @csrf
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" class="form-control">
                        <option>Pilih Kelas</option>
                        @foreach ($kelas as $obj)
                            <option value="{{ $obj->id }}">{{ $obj->nama }}</option>
                        @endforeach
                    </select>
                    @error('nisn')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                    @error('tanggal')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-flat btn-outline-primary mb-3 w-100">Next</button>
                <a href="{{ route('home.index') }}" class="btn btn-flat btn-outline-dark w-100">Cancel</a>
            </div>
        </form>
    </div>
@endsection
