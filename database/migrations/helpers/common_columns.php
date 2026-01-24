<?php

use Illuminate\Database\Schema\Blueprint;

function commonColumns(Blueprint $table, string $idType = 'uuid', bool $hasCode = false): void
{
    $idTypes = [
        'uuid' => fn () => $table->uuid('id')->primary(),
        'int' => fn () => $table->id(),
    ];

    ($idTypes[$idType] ?? fn () => $table->id())();

    $table->string('name', 255);

    if ($hasCode) {
        $table->string('code', 30)->unique();
    }

    $table->boolean('is_active')->default(true);
    $table->timestamps();
    $table->softDeletes();
}
