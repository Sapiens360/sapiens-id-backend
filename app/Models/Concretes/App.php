<?php

namespace App\Models\Concretes;

use App\Models\Bases\BaseEntity;

class App extends BaseEntity
{
    protected $table = 'apps';

    protected string $idType = 'uuid';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable ?? [], [
            'version',
        ]);
    }

    public function toSearchableArray()
    {
        return array_merge(parent::toSearchableArray(), [
            'version' => $this->version,
        ]);
    }
}
