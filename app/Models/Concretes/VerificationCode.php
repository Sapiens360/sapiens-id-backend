<?php

namespace App\Models\Concretes;

use App\Models\Enums\VerificationType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'verification_codes';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false; // porque solo tienes created_at manual

    protected $fillable = [
        'id',
        'code',
        'user',
        'created_at',
        'expires_at',
        'is_used',
        'type',
        'attempts',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_used' => 'boolean',
        'attempts' => 'integer',
        'type' => VerificationType::class,
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper methods
    |--------------------------------------------------------------------------
    */

    public function isExpired(): bool
    {
        return now()->greaterThan($this->expires_at);
    }

    public function canAttempt(): bool
    {
        return $this->attempts < 3 && ! $this->is_used && ! $this->isExpired();
    }

    public function markAsUsed(): void
    {
        $this->update(['is_used' => true]);
    }

    public function incrementAttempts(): void
    {
        $this->increment('attempts');

        if ($this->attempts >= 3) {
            $this->markAsUsed();
        }
    }
}
