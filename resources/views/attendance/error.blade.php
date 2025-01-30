@extends('layouts.app')

@section('content')

    @php
        $imgCross = asset('img/cross-mark.png');
    @endphp

    <div class="text-center">
        @if ($status === 'invalid_token')
            <img src="{{ $imgCross }}" alt="Absensi Gagal" class="mb-4" style="max-width: 150px;">
            <h3>Token Tidak Valid!</h3>
            <p>Token yang Anda gunakan sudah kadaluarsa atau tidak valid. Silakan coba lagi.</p>
        @elseif($status === 'attendance_full')
            <img src="{{ $imgCross }}" alt="Absensi Gagal" class="mb-4" style="max-width: 150px;">
            <h3>Absensi Sudah Tercatat!</h3>
            <p>Absensi sudah tercatat untuk hari ini. Tidak dapat melakukan absensi dua kali.</p>
        @elseif($status === 'invalid_staff')
            <img src="{{ $imgCross }}" alt="Absensi Gagal" class="mb-4" style="max-width: 150px;">
            <h3>Staff Tidak Ditemukan!</h3>
            <p>Staff yang Anda cari tidak ditemukan. Silakan coba lagi dengan ID yang benar.</p>
        @else
            <img src="{{ $imgCross }}" alt="Absensi Gagal" class="mb-4" style="max-width: 150px;">
            <h3>Absensi Gagal!</h3>
            <p>Terjadi kesalahan, silakan coba lagi nanti.</p>
        @endif
    </div>
@endsection
