<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = [
            ['start_date' => '2024-8-8', 'education' => 'S2 Teknik Informatika', 'user_id' => '2', 'position_id' => '1'],            
            ['start_date' => '2024-8-8', 'education' => 'S1 Teknik Informatika', 'user_id' => '3', 'position_id' => '2'],            
            ['start_date' => '2024-8-8', 'education' => 'S1 Teknik Informatika', 'user_id' => '4', 'position_id' => '2'],            
            ['start_date' => '2024-8-19', 'education' => 'SMK Rekayasa Perangkat Lunak', 'user_id' => '5', 'position_id' => '3'],            
            ['start_date' => '2024-8-19', 'education' => 'SMK Rekayasa Perangkat Lunak', 'user_id' => '6', 'position_id' => '4'],            
            ['start_date' => '2024-9-2', 'education' => 'S1 Desain Komunikasi Visual', 'user_id' => '7', 'position_id' => '5'],            
            ['start_date' => '2024-9-2', 'education' => 'S1 Manajemen', 'user_id' => '8', 'position_id' => '6'],            
            ['start_date' => '2024-9-2', 'education' => 'S1 Ilmu Komunikasi', 'user_id' => '9', 'position_id' => '7'],            
            ['start_date' => '2024-10-1', 'education' => 'S1 Teknik Informatika', 'user_id' => '10', 'position_id' => '8'],            
            ['start_date' => '2024-11-1', 'education' => 'D3 Teknologi Informasi', 'user_id' => '11', 'position_id' => '8'],            
            ['start_date' => '2024-11-1', 'education' => 'D3 Teknologi Informasi', 'user_id' => '12', 'position_id' => '8'],            
        ];

        foreach ($staff as $st) {
            Staff::create($st);
        }
    }
}
