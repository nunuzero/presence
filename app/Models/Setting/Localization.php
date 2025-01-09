<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    protected $fillable = [
        'language',
        'timezone',
    ];
}
