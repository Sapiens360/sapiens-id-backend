<?php

namespace Database\Seeders;

use App\Models\Concretes\App;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appIds = App::whereIn('code', ['SAPIENSID', 'SAPIENSSYS', 'SAPIENSLMS', 'SAPIENSTIME', 'SAPIENSTALK'])->pluck('id', 'code');
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Profile',
                'code' => 'SAPIENSID.PROFILE',
                'app_id' => $appIds['SAPIENSID'],
            ],
            [
                'id' => 2,
                'name' => 'Security',
                'code' => 'SAPIENSID.SECURITY',
                'app_id' => $appIds['SAPIENSID'],
            ],
            [
                'id' => 3,
                'name' => 'Users',
                'code' => 'SAPIENSID.USERS',
                'app_id' => $appIds['SAPIENSSYS'],
            ],
        ]);
    }
}
