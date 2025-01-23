<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelRoles = [
            ['role_id' => '2', 'model_type' => 'App\Models\User', 'model_id' => '1'],
            ['role_id' => '2', 'model_type' => 'App\Models\User', 'model_id' => '2'],
            ['role_id' => '2', 'model_type' => 'App\Models\User', 'model_id' => '3'],
            ['role_id' => '1', 'model_type' => 'App\Models\User', 'model_id' => '4'],
        ];

        DB::table('model_has_roles')->insert($modelRoles);
    }
}
