<?php

namespace App\Models\Concretes;

use App\Models\Bases\BaseEntity;

class Institute extends BaseEntity
{
    protected $table = 'institutes';

    protected string $idType = 'uuid';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable ?? [], [
            'email',
            'phone',
        ]);
    }

    public function toSearchableArray()
    {
        return array_merge(parent::toSearchableArray(), [
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
    }
}
