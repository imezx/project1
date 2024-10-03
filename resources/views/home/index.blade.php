@extends('layouts.app')

@section('content')
    <div class="button-group">
        <a class="btn btn-outline-primary w-20" href="{{ route('kelas.createIndex') }}"><i class="fa-solid fa-plus"></i> Add
            Kelas</a>
        <a class="btn btn-outline-dark w-20 ms-2" href="{{ route('siswa.createIndex') }}"><i class="fa-solid fa-plus"></i> Add
            Siswa</a>
        <a class="btn btn-outline-success w-20 ms-2" href="{{ route('absensi.precreateIndex') }}"><i
                class="fa-solid fa-plus"></i> Input Kehadiran</a>
    </div>
    <br>
    <table class="table table-hover table-responsive table-striped-columns table-hover" id="table-content">
        <thead>
            <tr>
                <th class="w-10">#</th>
                <th>Siswa</th>
                <th>Kelas</th>
                <th>Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $obj)
                <tr id="{{ $obj->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $obj->nama }}</td>
                    <td>{{ $obj->getKelas->nama }}</td>
                    <td>{{ $obj->getTotalKehadiranPersentase() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="{{ asset('/js/home.js') }}"></script>
@endsection
