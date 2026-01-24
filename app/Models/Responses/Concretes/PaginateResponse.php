<?php

namespace App\Models\Responses\Concretes;

use App\Models\Responses\Bases\Response;
use Illuminate\Http\JsonResponse;

class PaginateResponse extends Response
{
    public mixed $items;

    public int $currentPage;

    public int $lastPage;

    public int $perPage;

    public int $total;

    public function __construct(int $status, string $message, mixed $items, int $currentPage, int $lastPage, int $perPage, int $total)
    {
        $this->items = $items;
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->perPage = $perPage;
        $this->total = $total;

        return parent::__construct($status, $message);
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'items' => $this->items,
            'last_page' => $this->lastPage,
        ];
    }

    public function toResponse(): JsonResponse
    {
        return response()->json($this->toArray(), $this->status);
    }
}
