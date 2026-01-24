<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\IInstituteController;
use App\Models\Responses\Concretes\FailResponse;
use App\Models\Responses\Concretes\SuccessResponse;
use App\Services\Contracts\IInstituteService;
use App\Services\Contracts\ISearcherService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class BaseInstituteController extends SearcherController implements IInstituteController
{
    protected IInstituteService $instituteService;

    protected array $createRules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|max:191',
        'phone' => 'nullable|string|phone:BO|max:20',
        'apps' => 'nullable|array',
        'apps.*' => 'uuid',
    ];

    protected array $updateRules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|max:191',
        'phone' => 'nullable|string|phone:BO|max:20',
        'apps' => 'nullable|array',
        'apps.*' => 'uuid',
    ];

    public function __construct(IInstituteService $service)
    {
        $this->instituteService = $service;

        return parent::__construct($service, $this->createRules, $this->updateRules);
    }

    public function addApps(Request $request, string $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'apps' => 'nullable|array',
                'apps.*' => 'uuid',
            ]
        );

        if ($validate->fails()) {
            $response = new FailResponse(422, 'Verify the data sent', $validate->errors());

            return $response->toResponse();
        }

        $apps = $request->body('apps');

        if (empty($apps)) {
            $response = new FailResponse(422, 'App list is empty', null);

            return $response->toResponse();
        }

        try {
            $institute = $this->instituteService->addApps($id, $apps);
            $response = new SuccessResponse(200, 'Apps were added correctly', $institute);

            return $response->toResponse();
        } catch (Exception $e) {
            $response = new FailResponse(400, $e->getMessage(), null);

            return $response->toResponse();
        }
    }
}
