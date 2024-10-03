@extends('layouts.app')

@section('content')
    <h4>Input Absensi</h4>
    <div class="form-text"><i>Tgl: {{ $tgl }}</i></div>
    <hr>
    <div class="card">
        <form class="needs-validation" method="POST" action="{{ route('absensi.create', $tgl) }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-text mb-2"><i>Note: 1 = Hadir, 2 = Izin, 3 = Sakit & 4 = Alpha</i></div>
                    @foreach ($siswa as $obj)
                        <div class="col-md-4">
                            <div class="input-group mb-3 mb-2">
                                <span class="input-group-text">{{ $obj->nama }}</span>
                                @php
                                    $value = $obj->getByDate($tgl);
                                @endphp
                                @if (isset($value))
                                    <input type="number" class="form-control form-control-sm" min=0 max=4
                                        name="{{ $obj->nama }}" value="{{ $value->kehadiran_id }}">
                                @else
                                    <input type="number" class="form-control form-control-sm" min=0 max=4
                                        name="{{ $obj->nama }}" value="0">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-flat btn-outline-success mb-3 w-100">Update</button>
                <a href="{{ route('absensi.precreateIndex') }}" class="btn btn-flat btn-outline-dark w-100">Cancel</a>
            </div>
        </form>
    </div>
@endsection
