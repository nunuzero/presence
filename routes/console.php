<?php

use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Holiday;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Http;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Illuminate\Support\Facades\Artisan;
use Endroid\QrCode\ErrorCorrectionLevel;

Artisan::command('qrcode:generate', function() {
    $staffList = Staff::all();

    foreach ($staffList as $staff) {
        $token = md5(uniqid(rand(), true));
        
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

        cache()->put("attendance_token_{$staff->id}", $token, now()->addMinutes(5));
    }

    $this->info('QR Codes generated successfully for all staff.');
})->purpose('Generate QR code for attendance for each staff')->everyFiveMinutes();


Artisan::command('holidays:fetch', function() {
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