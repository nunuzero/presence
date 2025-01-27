<?php

use App\Models\Staff;
use App\Models\Presence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Filament\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance/verify/{token}/{staff_id}', function ($token, $staff_id) {
    $now = now();

    // Ambil token valid dari cache berdasarkan staff_id
    $validToken = Cache::get("attendance_token_{$staff_id}");

    // Cari data staff berdasarkan ID
    $staff = Staff::find($staff_id);
    if (!$staff) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid staff ID',
        ], 404);
    }

    // Periksa apakah token valid
    if ($token !== $validToken) {
        return response()->json([
            'status' => 'invalid',
            'message' => 'Invalid or expired token',
        ], 400);
    }

    // Periksa apakah sudah ada entri kehadiran untuk tanggal hari ini
    $existingPresence = Presence::where('user_id', $staff->user_id)
        ->whereDate('date', today())
        ->first();

    if ($existingPresence) {
        // Jika kolom return_time masih kosong, perbarui dengan waktu sekarang
        if (is_null($existingPresence->return_time)) {
            $existingPresence->update([
                'return_time' => $now->toTimeString(),
            ]);

            return response()->json([
                'message' => 'Return time updated successfully',
                'data' => $existingPresence,
            ]);
        }

        // Jika return_time sudah terisi, kembalikan pesan error
        return response()->json([
            'status' => 'error',
            'message' => 'Attendance already fully recorded for this user today',
            'data' => $existingPresence,
        ], 400);
    }

    // Buat entri kehadiran baru
    $presence = Presence::create([
        'user_id' => $staff->user_id,
        'presence_type_id' => 1, // ID untuk tipe kehadiran, sesuaikan kebutuhan
        'date' => $now->toDateString(),
        'time_arrived' => $now->toTimeString(),
    ]);

    return response()->json([
        'message' => 'Attendance recorded successfully',
        'data' => $presence,
    ]);
})->name('attendance.verify');