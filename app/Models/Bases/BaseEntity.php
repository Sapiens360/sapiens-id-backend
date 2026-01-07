<?php

namespace App\Models\Bases;

use App\Models\Traits\HasFlexibleId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseEntity extends Model
{
    use HasFactory, SoftDeletes, HasFlexibleId;
    protected string $table = "";

    protected $fillable = [
        'name',
        'code',
        'is_active'
    ];

    protected $casts = [
        'id' => 'string',
        'is_active' => 'boolean',
    ];
}
