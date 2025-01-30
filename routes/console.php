<?php

use Carbon\Carbon;
use App\Models\Leave;
use App\Models\Staff;
use App\Models\Holiday;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Http;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Illuminate\Support\Facades\Artisan;
use Endroid\QrCode\ErrorCorrectionLevel;

Artisan::command('qrcode:generate', function () {
    $staffList = Staff::all();

    foreach ($staffList as $staff) {
        $token = md5(uniqid(rand(), true));

        // Simpan token dengan status 'unused' dan waktu kedaluwarsa
        cache()->put("attendance_token_{$staff->id}", $token, now()->addMinutes(5));  // 5 menit valid

        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: route('attendance.verify', ['token' => $token, 'staff_id' => $staff->id]),
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
        );

        $result = $builder->build();

        $fileName = "qr/temp/staff_{$staff->id}_qrcode.png";
        $result->saveToFile(public_path($fileName));
    }

    $this->info('QR Codes generated successfully for all staff.');
})->purpose('Generate QR code for attendance for each staff')->everyFiveMinutes();


Artisan::command('holidays:fetch', function () {
    try {
        $currentMonth = Carbon::now()->format('m');

        $response = Http::get("https://api-harilibur.vercel.app/api", [
            'month' => $currentMonth
        ]);

        if ($response->successful()) {
            $holidays = $response->json();

            foreach ($holidays as $holiday) {
                $holidayDate = Carbon::parse($holiday['holiday_date']);

                Holiday::updateOrCreate(
                    ['date' => $holidayDate],
                    [
                        'name' => $holiday['holiday_name'],
                        'date' => $holidayDate,
                        'is_national_holiday' => $holiday['is_national_holiday']
                    ]
                );
            }

            $this->info('Holidays data has been successfully fetched and stored.');
        } else {
            $this->error('Failed to fetch data from API.');
        }
    } catch (\Exception $e) {
        $this->error('Error: ' . $e->getMessage());
    }
})->purpose('Fetch holidays data from API')->monthlyOn(1, '00:00');

Artisan::command('leave:generate-allocation', function () {
    $currentYear = Carbon::now()->year;
    $currentMonth = Carbon::now()->month;

    $staffList = Staff::all();

    foreach ($staffList as $staff) {
        $leaveAllocation = $staff->position->leave_allocation;

        Leave::updateOrCreate(
            [
                'staff_id' => $staff->id,
                'year' => $currentYear,
                'month' => $currentMonth
            ],
            [
                'leave_allocation' => $leaveAllocation,
                'remaining_leave' => $leaveAllocation,
            ]
        );
    }

    $this->info('Leave allocation data has been successfully generated for this month.');
})->purpose('Generate monthly leave allocation data for all staff')->monthlyOn(1, '00:00');

Artisan::command('wfh:check', function () {
    $today = Carbon::now()->format('l');

    $wfhSchedules = \App\Models\WfhSchedule::where($today, true)->get();

    foreach ($wfhSchedules as $schedule) {
        $user = $schedule->user;

        $existingPresence = \App\Models\Presence::where('user_id', $user->id)
            ->where('date', Carbon::today()->toDateString())
            ->first();

        if (!$existingPresence) {
            $presenceType = \App\Models\PresenceType::where('type', 'WFH')->first();

            \App\Models\Presence::create([
                'user_id' => $user->id,
                'presence_type_id' => $presenceType->id,
                'date' => Carbon::today()->toDateString(),
                'time_arrived' => null,
                'return_time' => null,
            ]);

            $this->info("Presence created for user: {$user->name} for WFH today.");
        }
    }

    $this->info('WFH check completed successfully.');
})->purpose('Check and create Presence data for users who are WFH today')->daily();
