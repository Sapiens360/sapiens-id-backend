<?php

namespace App\Services\Bases;

use App\Models\Concretes\Institute;
use App\Services\Contracts\IInstituteService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseInstituteService extends SearcherService implements IInstituteService
{
    protected Institute $institute;

    public function __construct(Institute $institute)
    {
        $this->institute = $institute;
        return parent::__construct($this->institute);
    }

    public function addApps(string $id, array $apps = [])
    {
        $institute = $this->getBy('id', $id);

        if (empty($institute)) {
            throw new ModelNotFoundException('Institute not found');
        }

        if (empty($apps)) {
            throw new ModelNotFoundException('Apps not found');
        }

        $institute->apps = $apps;

        $institute->save();

        return $institute;
    }
}
