<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance/verify/{token}', function ($token) {
    $validToken = cache()->get('attendance_token');
    
    if ($token === $validToken) {
        // Proses absensi di sini
        return response()->json(['status' => 'success']);
    }
    
    return response()->json(['status' => 'invalid'], 400);
})->name('attendance.verify');