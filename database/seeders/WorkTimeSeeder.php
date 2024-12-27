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
            ['day' => 'Sunday', 'is_workday' => '0', 'start_time' => null, 'end_time' => null, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Monday', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Tuesday', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Wednesday', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Thursday', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Friday', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['day' => 'Saturday', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
        ];

        DB::table('work_times')->insert($workTimes);
    }
}
