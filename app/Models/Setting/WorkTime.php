<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $fillable = [
        'day',
        'is_workday',
        'start_time',
        'end_time',
    ];
}
