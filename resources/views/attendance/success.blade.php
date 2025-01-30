@extends('layouts.app')

@section('content')
    @php
        $imgCheck = asset('img/check-mark.png');
        $imgCross = asset('img/cross-mark.png');
    @endphp

    <div class="text-center">
        @if ($status === 'success')
            <img src="{{ $imgCheck }}" alt="Absensi Berhasil" class="mb-4" style="max-width: 150px;">
            <h3>Absensi Masuk Berhasil!</h3>
            <p>Absensi Masuk Berhasil pada {{ $time }}</p>
        @elseif($status === 'return')
            <img src="{{ $imgCheck }}" alt="Absensi Pulang Berhasil" class="mb-4"
                style="max-width: 150px;">
            <h3>Absensi Pulang Berhasil!</h3>
            <p>Absensi Pulang Berhasil pada {{ $time }}</p>
        @else
            <img src="{{ $imgCross }}" alt="Absensi Gagal" class="mb-4" style="max-width: 150px;">
            <h3>Absensi Gagal!</h3>
            <p>Terjadi kesalahan, silakan coba lagi.</p>
        @endif
    </div>
@endsection