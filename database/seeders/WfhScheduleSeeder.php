<?php

namespace Database\Seeders;

use App\Models\WfhSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WfhScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wfhSchedules = [
            ['user_id' => '7', 'monday' => '0', 'tuesday' => '0', 'wednesday' => '0', 'thursday' => '1', 'friday' => '1', 'saturday' => '1', 'sunday' => '0'],
            ['user_id' => '8', 'monday' => '0', 'tuesday' => '0', 'wednesday' => '0', 'thursday' => '1', 'friday' => '1', 'saturday' => '1', 'sunday' => '0'],
            ['user_id' => '10', 'monday' => '0', 'tuesday' => '0', 'wednesday' => '0', 'thursday' => '0', 'friday' => '1', 'saturday' => '1', 'sunday' => '0'],
            ['user_id' => '11', 'monday' => '0', 'tuesday' => '0', 'wednesday' => '0', 'thursday' => '0', 'friday' => '1', 'saturday' => '1', 'sunday' => '0'],
            ['user_id' => '12', 'monday' => '0', 'tuesday' => '0', 'wednesday' => '0', 'thursday' => '0', 'friday' => '1', 'saturday' => '1', 'sunday' => '0'],
        ];

        foreach ($wfhSchedules as $wfhSchedule) {
            WfhSchedule::create($wfhSchedule);
        }
    }
}
