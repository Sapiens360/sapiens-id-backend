<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Support\Facades\Request;

interface IVerificationController
{
    public function create(Request $request);

    public function verify(Request $request);
}
