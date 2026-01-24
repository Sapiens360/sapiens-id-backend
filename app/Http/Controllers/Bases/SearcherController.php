<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\ISearcherController;
use App\Models\Responses\Concretes\PaginateResponse;
use App\Models\Responses\Concretes\SuccessResponse;
use App\Services\Contracts\ISearcherService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class SearcherController extends Controller implements ISearcherController
{
    protected ISearcherService $searcherService;

    public function __construct(ISearcherService $service, array $createRules = [], array $updateRules = [])
    {
        $this->searcherService = $service;
        parent::__construct($service, $createRules, $updateRules);
    }

    public function search(Request $request)
    {
        $value = $request->query('value');
        $direction = strtolower($request->query('direction', 'asc'));
        $direction = in_array($direction, ['asc', 'desc']) ? $direction : 'asc';

        $orderBy = $request->query('orderBy', 'name');
        $orderBy = $orderBy ? $orderBy : 'name';

        $page = (int) ($request->query('page', 0));
        $size = (int) ($request->query('size', 0));

        $filters = $request->query('filters') ?? [];

        $data = $this->searcherService->search($value, $direction, $filters, $orderBy, $page, $size);

        if ($data instanceof LengthAwarePaginator) {
            $response = new PaginateResponse(
                200,
                'Data correctly obtained',
                $data->items(),
                $data->currentPage(),
                $data->lastPage(),
                $data->perPage(),
                $data->total()
            );

            return $response->toResponse();
        }

        $response = new SuccessResponse(200, 'Data correctly obtained', $data);

        return $response->toResponse();
    }
}
