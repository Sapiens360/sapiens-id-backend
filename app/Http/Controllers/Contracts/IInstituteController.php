<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;

interface IInstituteController extends ISearcherController
{
    public function addApps(Request $request, string $id);

    public function removeApps(Request $request, string $id);

    public function verifyAppAccess(string $id, string $code);
}
