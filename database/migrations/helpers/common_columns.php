<?php

use Illuminate\Database\Schema\Blueprint;

function commonColumns(Blueprint $table, bool $hasCode = false, bool $hasImage = false): void
{
    $table->uuid('id')->primary();
    $table->string('name', 255);

    if ($hasCode) {
        $table->string('code', length: 255)->unique();
    }

    if ($hasImage) {
        $table->string('image_url', 255);
    }

    $table->boolean('is_active')->default(true);
    $table->timestamps();
    $table->softDeletes();
}
