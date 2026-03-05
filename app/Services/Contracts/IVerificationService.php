<?php

namespace App\Services\Contracts;

use App\Models\Enums\VerificationType;

interface IVerificationService
{
    public function create(string $user, VerificationType $type);

    public function verify(string $user, string $code, VerificationType $type);

//    public function hasActiveCode(string $user, VerificationType $type);
//    public function invalidate(string $user, VerificationType $type);
}
