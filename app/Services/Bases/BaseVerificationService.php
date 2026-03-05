<?php

namespace App\Services\Bases;

use App\Models\Concretes\VerificationCode;
use App\Models\Enums\VerificationType;
use App\Services\Contracts\IVerificationService;
use Illuminate\Support\Str;

class BaseVerificationService implements IVerificationService
{
    protected VerificationCode $verificationCode;

    public function __construct(VerificationCode $verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function create(string $user, VerificationType $type): bool
    {
        $code = mb_strtoupper(Str::random(8));

        $createdCode = VerificationCode::create([
            'user' => $user,
            'type' => $type,
            'code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        return !empty($createdCode);
    }

    public function verify(string $user, string $code, VerificationType $type): bool
    {
        $data = VerificationCode::where('user', $user)->where('type', $type)->where('expires_at', '>', now())
            ->where
            ('is_used', false)->where('attempts', '<', 3)->where('code', $code)->first();

        if (!$data) {
            return false;
        }

        $generatedCode = $data->code;

        if ($generatedCode !== $code) {
            $data->attempts++;
            $data->save();
            return false;
        }

        $data->is_used = true;
        $data->save();

        return true;
    }
}
