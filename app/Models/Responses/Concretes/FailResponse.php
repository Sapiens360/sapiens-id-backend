<?php

namespace App\Models\Responses\Concretes;

use App\Models\Responses\Bases\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;

class FailResponse extends Response
{
    public ?MessageBag $errors;

    public function __construct(int $status, string $message, ?MessageBag $errors)
    {
        $this->errors = $errors;

        return parent::__construct($status, $message);
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'errors' => $this->errors,
        ];
    }

    public function toResponse(): JsonResponse
    {
        return response()->json($this->toArray(), $this->status);
    }
}
