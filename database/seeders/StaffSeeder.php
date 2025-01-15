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
            ['start_date' => '2024-10-1', 'education' => 'S1 Teknik Informatika', 'user_id' => '1', 'position_id' => '8'],            
            ['start_date' => '2024-11-1', 'education' => 'D3 Teknologi Informasi', 'user_id' => '2', 'position_id' => '8'],            
            ['start_date' => '2024-11-1', 'education' => 'D3 Teknologi Informasi', 'user_id' => '3', 'position_id' => '8'],            
        ];

        foreach ($staff as $st) {
            Staff::create($st);
        }
    }
}
