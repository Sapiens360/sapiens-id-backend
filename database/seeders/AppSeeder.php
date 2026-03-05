<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function Symfony\Component\Clock\now;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('apps')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'SapiensID',
                'code' => 'SAPIENSID',
                'description' => 'Centralized identity provider that manages authentication, authorization, and secure access across the entire Sapiens ecosystem.',
                'version' => '0.0.1+20260101',
                'image_url' => '',
                'created_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SapiensSys',
                'code' => 'SAPIENSSYS',
                'description' => 'Core academic management system that allows administrators to manage users, courses, roles, and key institutional configurations from a single platform.',
                'version' => '0.0.1+20260101',
                'image_url' => '',
                'created_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SapiensLMS',
                'code' => 'SAPIENSLMS',
                'description' => 'Learning management platform that enables the creation, delivery, and tracking of courses, assignments, assessments, and student progress.',
                'version' => '0.0.1+20260101',
                'image_url' => '',
                'created_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SapiensTime',
                'code' => 'SAPIENSTIME',
                'description' => 'Academic calendar application that centralizes institutional events and student schedules, keeping the academic community organized and informed.',
                'version' => '0.0.1+20260101',
                'image_url' => '',
                'created_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SapiensTalk',
                'code' => 'SAPIENSTALK',
                'description' => 'Institutional communication platform that integrates chat, voice calls, and video meetings to enhance collaboration between students, faculty, and staff.',
                'version' => '0.0.1+20260101',
                'image_url' => '',
                'created_at' => now(),
            ],
        ]);
    }
}
