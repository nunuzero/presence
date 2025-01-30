<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WfhSchedule extends Model
{
    protected $fillable = [
        'user_id', 
        'monday', 
        'tuesday', 
        'wednesday', 
        'thursday', 
        'friday', 
        'saturday', 
        'sunday'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
