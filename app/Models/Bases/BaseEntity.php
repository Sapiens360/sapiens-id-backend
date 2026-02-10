<?php

namespace App\Models\Bases;

use App\Models\Traits\HasFlexibleId;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class BaseEntity extends Model
{
    use HasFactory, HasFlexibleId, HasUuids, Searchable, SoftDeletes;

    protected $table = '';

    protected $fillable = [
        'name',
        'code',
        'is_active',
    ];

    protected $casts = [
        'id' => 'string',
        'is_active' => 'boolean',
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}
