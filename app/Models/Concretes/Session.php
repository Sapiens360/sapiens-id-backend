<?php

namespace App\Models\Concretes;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = "sessions";

    protected $fillable = [
        'user',
        'agent',
        'ip',
        'browser',
        'os',
        'device_type',
        'last_activity',
        'is_trusted',
        'country',
        'city',
        'is_active'
    ];

    protected $casts = [
        'id' => 'string',
        'user' => 'string',
        'is_active' => 'boolean',
    ];
}
