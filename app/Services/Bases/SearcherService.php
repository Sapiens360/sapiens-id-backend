<?php

namespace App\Services\Bases;

use App\Services\Contracts\ISearcherService;
use Illuminate\Database\Eloquent\Model;

abstract class SearcherService extends Service implements ISearcherService
{
    public function __construct(Model $model)
    {
        return parent::__construct($model);
    }

    public function search(
        string $value = '', string $direction = 'asc',
        array $filters = [],
        string $orderBy = 'name',
        int $page = 0,
        int $size = 0
    ) {
        $query = $this->model->where('name', 'like', '%'.$value.'%')->orderBy($orderBy, $direction);

        if ($page > 0 && $size > 0) {
            return $query->paginate(
                $size,
                ['*'],
                'page',
                $page
            );
        }

        return $query->get();
    }
}
