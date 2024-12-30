<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presence extends Model
{
    protected $fillable = [
        'user_id',
        'presence_type_id',
        'time',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function presenceType(): BelongsTo
    {
        return $this->belongsTo(PresenceType::class);
    }
}
