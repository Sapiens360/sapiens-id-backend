<?php

namespace App\Models\Concretes;

use App\Models\Bases\BaseEntity;

class Role extends BaseEntity
{
    protected string $table = "roles";

    protected string $idType = 'int';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable ?? [], [
            'permissions'
        ]);

        $this->casts = array_merge($this->casts ?? [], [
            'permissions' => 'array'
        ]);
    }
}
