<?php

namespace App\Http\Controllers\Contracts;

use App\Http\Controllers\Contracts\ISearcherController;

interface IRoleController extends ISearcherController
{
    function getMyPermission(int $id);
}
