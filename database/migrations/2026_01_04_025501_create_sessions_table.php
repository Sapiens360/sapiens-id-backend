<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('agent', 512)->default('');
            $table->string('ip', 45);
            $table->string('browser', 50)->nullable();
            $table->string('os', 50)->nullable();
            $table->string('device_type', 20)->nullable();
            $table->dateTime('last_activity');
            $table->boolean('is_trusted')->default(false);
            $table->string('country', 255);
            $table->string('city', 255);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
