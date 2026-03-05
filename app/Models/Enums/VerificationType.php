<?php

namespace App\Models\Enums;

enum VerificationType: string
{
    case REGISTER = 'register';
    case EMAIL_VERIFICATION = 'email_verification';
    case PASSWORD_RESET = 'password_reset';
    case TWO_FA = '2fa';
}
