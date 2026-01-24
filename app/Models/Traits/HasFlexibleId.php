<?php

namespace App\Models\Traits;

trait HasFlexibleId
{
    protected string $idType = 'int';

    protected function initializeHasFlexibleId(): void
    {
        if ($this->idType === 'uuid') {
            $this->keyType = 'string';
            $this->incrementing = false;
        } else {
            $this->keyType = 'int';
            $this->incrementing = true;
        }
    }
}
