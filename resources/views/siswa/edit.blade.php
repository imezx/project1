@extends('layouts.app')

@section('content')
    <h4>Edit Siswa - {{ $siswa->nama }}</h4>
    <hr>
    <div class="row">
        <form class="needs-validation" method="POST" action="{{ route('siswa.update', $siswa->id) }}">
            @csrf
            @method('PUT')
            @php
                $nama_kelas = $siswa->getKelas->nama;
            @endphp
            <div class="card">
                <div class="card-body">
                    <h5>Data Siswa</h5>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Nama: </span>
                            <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Kelas: </span>
                            <select name="kelas" class="form-control" required>
                                <option>Pilih Kelas</option>
                                @foreach ($kelas as $obj)
                                    @if ($obj->nama == $nama_kelas)
                                        <option value="{{ $obj->id }}" selected>{{ $obj->nama }}</option>
                                    @else
                                        <option value="{{ $obj->id }}">{{ $obj->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kelas')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-flat btn-outline-success mb-3 w-100">Update</button>
                    <a href="{{ route('siswa.detail', $siswa->id) }}"
                        class="btn btn-flat btn-outline-dark w-100">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection
