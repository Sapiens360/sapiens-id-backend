<?php

namespace App\Models\Responses\Contract;

use Illuminate\Http\JsonResponse;

interface IResponse
{
    public function toArray(): array;

    public function toResponse(): JsonResponse;
}
