<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

require_once database_path('migrations/helpers/common_columns.php');

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            commonColumns($table, 'uuid', false);
            $table->string('firstnames', 255);
            $table->string('lastnames', 255);
            $table->string('shortname', 255);
            $table->string('username', 255);
            $table->string('email', 191)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('password', 255);
            $table->foreignUuid('institute')->constrained('institutes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('role')->constrained('roles')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
