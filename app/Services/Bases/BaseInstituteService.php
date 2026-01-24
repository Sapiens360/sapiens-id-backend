<?php

namespace App\Services\Bases;

use App\Models\Concretes\Institute;
use App\Services\Contracts\IInstituteService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

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

        if (! $institute) {
            throw new ModelNotFoundException('Institute not found');
        }

        if (empty($apps)) {
            throw new InvalidArgumentException('Apps list is empty');
        }

        $actualApps = $institute->apps ?? [];

        $appList = array_values(
            array_unique(array_merge($actualApps, $apps))
        );

        $institute->apps = $appList;
        $institute->save();

        return $institute;
    }

    public function removeApps(string $id, array $apps = [])
    {
        $institute = $this->getBy('id', $id);

        if (! $institute) {
            throw new ModelNotFoundException('Institute not found');
        }

        if (empty($apps)) {
            throw new InvalidArgumentException('Apps list is empty');
        }

        $actualApps = $institute->apps ?? [];

        $appList = array_values(
            array_diff($actualApps, $apps)
        );

        $institute->apps = $appList;
        $institute->save();

        return $institute;
    }
}
