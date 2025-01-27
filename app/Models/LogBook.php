<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    protected $fillable = [
        'work',
        'date',
        'user_id'
    ];
}
