<?php

use App\Models\Staff;
use App\Models\Presence;
use App\Models\PresenceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Filament\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance/verify/{token}/{staff_id}', function ($token, $staff_id) {
    $now = now();

    $validToken = cache()->get("attendance_token_{$staff_id}");

    if ($token !== $validToken) {
        return redirect()->route('attendance.error', ['status' => 'invalid_token']);
    }

    $staff = Staff::find($staff_id);
    if (!$staff) {
        return redirect()->route('attendance.error', ['status' => 'invalid_staff']);
    }

    cache()->forget("attendance_token_{$staff->id}");

    $existingPresence = Presence::where('user_id', $staff->user_id)
        ->whereDate('date', today())
        ->first();

    if ($existingPresence) {
        if (is_null($existingPresence->return_time)) {
            $existingPresence->update([
                'return_time' => $now->toTimeString(),
            ]);
            return redirect()->route('attendance.success', [
                'status' => 'return',
                'time' => $existingPresence->return_time
            ]);
        }

        return redirect()->route('attendance.error', ['status' => 'attendance_full']);
    }

    $presenceType = PresenceType::where('type', 'WFO')->first();

    $presence = Presence::create([
        'user_id' => $staff->user_id,
        'presence_type_id' => $presenceType->id,
        'date' => $now->toDateString(),
        'time_arrived' => $now->toTimeString(),
    ]);

    return redirect()->route('attendance.success', [
        'status' => 'success',
        'time' => $presence->time_arrived
    ]);
})->name('attendance.verify');

Route::get('/attendance/success/{status}/{time}', function ($status, $time) {
    return view('attendance.success', compact('status', 'time'));
})->name('attendance.success');

Route::get('/attendance/error/{status}', function ($status) {
    return view('attendance.error', compact('status'));
})->name('attendance.error');
