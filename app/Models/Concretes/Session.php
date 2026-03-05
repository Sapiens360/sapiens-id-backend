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
        'refresh_token_hash',
        'refresh_expires_at',
        'is_active',
        'is_blocked'
    ];

    protected $casts = [
        'id' => 'string',
        'user' => 'string',
        'is_active' => 'boolean',
        'is_blocked' => 'boolean',
    ];
}
