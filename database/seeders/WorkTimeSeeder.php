<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\WorkTime;
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
        $workTimes = [
            ['day' => 'Sunday', 'is_workday' => '0','time_limit' => 0, 'start_time' => null, 'end_time' => null],
            ['day' => 'Monday', 'is_workday' => '1','time_limit' => 30, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Tuesday', 'is_workday' => '1','time_limit' => 30, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Wednesday', 'is_workday' => '1','time_limit' => 30, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Thursday', 'is_workday' => '1','time_limit' => 30, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Friday', 'is_workday' => '1','time_limit' => 30, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Saturday', 'is_workday' => '1','time_limit' => 30, 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
        ];        

        foreach ($workTimes as $workTime) {
            WorkTime::create($workTime);
        }
    }
}
