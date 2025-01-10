<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Wallo\Transmatic\Facades\Transmatic;

class Localization extends Model
{
    protected $fillable = [
        'language',
        'timezone',
    ];

    public static function getAllLanguages(): array
    {
        return Transmatic::getSupportedLanguages();
    }
}
