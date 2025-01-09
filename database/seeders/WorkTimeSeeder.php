<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = now();

        $workTimes = [
            ['day' => 'Minggu', 'is_workday' => '0', 'start_time' => null, 'end_time' => null, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Senin', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Selasa', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Rabu', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Kamis', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Jum\'at', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Sabtu', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
        ];

        DB::table('work_times')->insert($workTimes);
    }
}
