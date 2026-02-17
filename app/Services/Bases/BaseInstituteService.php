<?php

namespace App\Services\Bases;

use App\Models\Concretes\Institute;
use App\Services\Contracts\IAppService;
use App\Services\Contracts\IInstituteService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

class BaseInstituteService extends SearcherService implements IInstituteService
{
    protected Institute $institute;

    protected IAppService $appService;

    public function __construct(Institute $institute, IAppService $appService)
    {
        $this->institute = $institute;
        $this->appService = $appService;

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

    public function verifyAppAccess(string $id, string $code): bool
    {
        $institute = $this->getBy('id', $id);

        if (! $institute) {
            return false;
        }

        $apps = $institute->apps ?? [];

        if (empty($apps)) {
            return false;
        }

        $appId = $this->appService->verifyExistByCode($code);

        if (! $appId) {
            return false;
        }

        return in_array($appId, $apps, true);
    }
}
