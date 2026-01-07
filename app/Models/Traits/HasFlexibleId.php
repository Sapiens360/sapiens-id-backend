<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

trait HasFlexibleId
{
    protected string $idType = 'int';

    protected function initializeHasFlexibleId(): void
    {
        switch ($this->idType) {
            case 'int':
            case 'bigint':
                $this->keyType = 'int';
                $this->incrementing = true;
                break;
            case 'uuid':
            default:
                $this->keyType = 'string';
                $this->incrementing = false;

                if (!in_array(HasUuids::class, class_uses($this))) {
                    class_uses_recursive(static::class);
                    $this->traits[] = HasUuids::class;
                }
                break;
        }
    }
}
