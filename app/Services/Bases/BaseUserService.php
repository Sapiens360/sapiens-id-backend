<?php

namespace App\Services\Bases;

use App\Models\Concretes\User;
use App\Models\Enums\VerificationType;
use App\Services\Contracts\IUserService;
use App\Services\Contracts\IVerificationService;

class BaseUserService extends SearcherService implements IUserService
{

    protected User $user;
    protected IVerificationService $verificationService;

    public function __construct(User $user, IVerificationService $verificationService)
    {
        $this->user = $user;
        $this->verificationService = $verificationService;
        parent::__construct($this->user);
    }

    function register(array $data)
    {
        $createdUser = $this->create($data);
        $this->verificationService->create($createdUser->id, app(VerificationType::class)->EMAIL_VERIFICATION);
        return $createdUser;
    }

    function forgotPassword(string $email)
    {
        $user = $this->getBy('email', $email);

        if (!$user) {
            return null;
        }


    }

    function resetPassword(string $id, string $password)
    {
        // TODO: Implement resetPassword() method.
    }
}
