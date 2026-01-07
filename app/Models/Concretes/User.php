<?php

namespace App\Models\Concretes;

use App\Models\Bases\BaseEntity;

class User extends BaseEntity
{
    protected string $table = "users";

    protected string $idType = 'uuid';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable ?? [], [
            'firstnames',
            'lastnames',
            'shortname',
            'username',
            'email',
            'phone',
            'password',
            'institute',
            'role'
        ]);

        $this->casts = array_merge($this->casts ?? [], [
            'institute' => 'string'
        ]);
    }
}
