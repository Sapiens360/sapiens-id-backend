<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;

interface ISearcherController extends IController
{
    public function search(Request $request);
}
