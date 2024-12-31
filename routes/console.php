<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\Holiday;

Artisan::command('qrcode:generate', function() {
    $token = md5(uniqid(rand(), true));
    
    $builder = new Builder(
        writer: new PngWriter(),
        writerOptions: [],
        validateResult: false,
        data: route('attendance.verify', ['token' => $token]),
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: 300,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
    );

    $result = $builder->build();
    $result->saveToFile(public_path('qr/qrcode.png'));

    cache()->put('attendance_token', $token, now()->addMinutes(5));
    
    $this->info('QR Code generated successfully');
})->purpose('Generate QR code for attendance')->everyFiveMinutes();

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