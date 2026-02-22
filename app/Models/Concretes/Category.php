<?php

namespace App\Models\Concretes;

use App\Models\Bases\BaseEntity;

class Category extends BaseEntity
{
    protected $table = "categories";

    protected string $idType = 'int';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable ?? [], [
            'app',
        ]);

        $this->casts = array_merge($this->casts ?? [], [
            'app' => 'string'
        ]);
    }
}
