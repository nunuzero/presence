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
            ['day' => 'Minggu', 'is_workday' => '0', 'start_time' => null, 'end_time' => null],
            ['day' => 'Senin', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Selasa', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Rabu', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Kamis', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Jum\'at', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
            ['day' => 'Sabtu', 'is_workday' => '1', 'start_time' => '08:00:00', 'end_time' => '17:00:00'],
        ];

        foreach ($workTimes as $workTime) {
            WorkTime::create($workTime);
        }
    }
}
