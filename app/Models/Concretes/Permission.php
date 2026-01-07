<?php

namespace App\Models\Concretes;

use App\Models\Bases\BaseEntity;

class Permission extends BaseEntity
{
    protected string $table = "permissions";

    protected string $idType = 'int';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable ?? [], [
            'category',
        ]);
    }
}
