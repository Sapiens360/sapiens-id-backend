<?php

namespace App\Models\Traits;

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
                break;
        }
    }
}
