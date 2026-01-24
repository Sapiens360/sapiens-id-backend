<?php

namespace App\Models\Responses\Concretes;

use App\Models\Responses\Bases\Response;
use Illuminate\Http\JsonResponse;

class SuccessResponse extends Response
{
    public mixed $data;

    public function __construct(int $status, string $message, mixed $data)
    {
        $this->data = $data;

        return parent::__construct($status, $message);
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }

    public function toResponse(): JsonResponse
    {
        return response()->json($this->toArray(), $this->status);
    }
}
