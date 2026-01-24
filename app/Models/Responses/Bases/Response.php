<?php

namespace App\Models\Responses\Bases;

use App\Models\Responses\Contract\IResponse;
use Illuminate\Http\JsonResponse;

abstract class Response implements IResponse
{
    public int $status;

    public string $message;

    public function __construct(int $status, string $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
        ];
    }

    public function toResponse(): JsonResponse
    {
        return response()->json($this->toArray(), $this->status);
    }
}
