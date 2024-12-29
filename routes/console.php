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

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::call('qrcode:generate');

// Tambahkan command untuk generate QR code
Artisan::command('qrcode:generate', function() {
    // Generate random token
    $token = md5(uniqid(rand(), true));
    
    $builder = new Builder(
        writer: new PngWriter(),
        writerOptions: [],
        validateResult: false,
        data: route('attendance.verify', ['token' => $token]), // URL dengan token
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: 300,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
        labelText: 'Scan to take attendance',
        labelFont: new OpenSans(20),
        labelAlignment: LabelAlignment::Center
    );

    $result = $builder->build();
    $result->saveToFile(public_path('qr/qrcode.png'));

    // Simpan token ke cache
    cache()->put('attendance_token', $token, now()->addMinutes(5));
    
    $this->info('QR Code generated successfully');
})->purpose('Generate QR code for attendance')->everyFiveMinutes();