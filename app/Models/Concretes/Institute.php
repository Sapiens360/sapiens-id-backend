<?php

namespace App\Models\Concretes;

use App\Models\Bases\BaseEntity;

class Institute extends BaseEntity
{
    protected string $table = "institutes";

    protected string $idType = 'uuid';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable ?? [], [
            'email',
            'phone',
            'apps'
        ]);

        $this->casts = array_merge($this->casts ?? [], [
            'apps' => 'array'
        ]);
    }
}
