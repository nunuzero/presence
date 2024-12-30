<?php

use App\Models\Presence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Filament\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance/verify/{token}', function ($token) {
    $validToken = cache()->get('attendance_token');
    $user = Auth::user();
    $now = now();

    $existingPresence = Presence::where('user_id', $user->id)
        ->whereDate('time', today())
        ->first();

    if ($existingPresence) {
        return response()->json([
            'status' => 'error',
            'message' => 'You have already recorded your attendance today',
            'data' => $existingPresence
        ], 400);
    }

    if ($token === $validToken) {
        $presence = Presence::create([
            'user_id' => $user->id,
            'presence_type_id' => 1,
            'time' => $now,
        ]);
        
        return response()->json([
            'message' => 'Presence recorded successfully',
            'data' => $presence
        ]);
    }
    
    return response()->json(['status' => 'invalid'], 400);
})->middleware(Authenticate::class)->name('attendance.verify');