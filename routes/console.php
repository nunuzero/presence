<?php

use Carbon\Carbon;
use App\Models\Leave;
use App\Models\Staff;
use App\Models\Holiday;
use App\Models\Presence;
use App\Models\WfhSchedule;
use App\Models\PresenceType;
use App\Models\Setting\WorkTime;
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

        cache()->put("attendance_token_{$staff->id}", $token, now()->addMinutes(5));

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
    $today = Carbon::today();
    $dayOfWeek = $today->format('l');
    
    $workday = WorkTime::where('day', $dayOfWeek)->where('is_workday', 1)->first();
    $holiday = Holiday::where('date', $today)->where('is_national_holiday', 1)->first();

    if ($workday && !$holiday) {
        $wfhSchedules = WfhSchedule::where($today, true)->get();

        foreach ($wfhSchedules as $schedule) {
            $user = $schedule->user;

            $existingPresence = Presence::where('user_id', $user->id)
                ->where('date', $today->toDateString())
                ->first();
            
            if (!$existingPresence) {
                $presenceType = PresenceType::where('type', 'WFH')->first();

                Presence::create([
                    'user_id' => $user->id,
                    'presence_type_id' => $presenceType->id,
                    'date' => $today->toDateString(),
                    'time_arrived' => null,
                    'return_time' => null,
                ]);

                $this->info("Presensi WFH dibuat untuk user: {$user->name}.");
            }
        }

        $this->info('Pengecekan WFH selesai.');
    } else {
        $this->info('Hari ini bukan hari kerja atau merupakan hari libur nasional.');
    }
})->purpose('Pengecekan dan pembuatan presensi WFH untuk users yang dijadwalkan dan belum absen')->daily();


Artisan::command('attendance:check-missing', function () {
    $today = Carbon::today();
    $dayOfWeek = $today->format('l');
    
    $workday = WorkTime::where('day', $dayOfWeek)->where('is_workday', 1)->first();
    $holiday = Holiday::where('date', $today)->where('is_national_holiday', 1)->first();

    if ($workday && !$holiday) {
        $staffList = Staff::all();

        $absenceType = PresenceType::where('type', 'Tidak Masuk')->first();

        foreach ($staffList as $staff) {
            $existingPresence = Presence::where('user_id', $staff->user_id)
                ->where('date', $today->toDateString())
                ->first();

            if (!$existingPresence) {
                Presence::create([
                    'user_id' => $staff->user_id,
                    'presence_type_id' => $absenceType->id,
                    'date' => $today->toDateString(),
                    'time_arrived' => null,
                    'return_time' => null,
                ]);

                $this->info("Presensi Tidak Masuk dibuat untuk user: {$staff->user->name}.");
            }
        }

        $this->info('Pengecekan presensi selesai.');
    } else {
        $this->info('Hari ini bukan hari kerja atau merupakan hari libur nasional.');
    }
})->purpose('Pengecekan dan pembuatan presensi Tidak Masuk untuk staf yang belum absen')->dailyAt('23:50');