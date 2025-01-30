<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = [
        'logo',
        'login_background'
    ];

    protected static function booted(): void
    {
        static::updating(function ($user) {
            $originalImage = $user->getOriginal('logo');
            $originalImage2 = $user->getOriginal('login_background');
            
            if ($originalImage && Storage::disk('logo')->exists($originalImage)) {
                Storage::disk('logo')->delete($originalImage);
            }

            if ($originalImage2 && Storage::disk('login_background')->exists($originalImage2)) {
                Storage::disk('login_background')->delete($originalImage2);
            }
        });
    }
}
