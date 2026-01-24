<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;

interface IController
{
    public function index(Request $request);

    public function show(Request $request);

    public function store(Request $request);

    public function update(Request $request, string|int $id);

    public function destroy(string|int $id);
}
