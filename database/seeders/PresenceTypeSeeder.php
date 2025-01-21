<?php

namespace Database\Seeders;

use App\Models\PresenceType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PresenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presenceTypes = [
            ['type' => 'WFO', 'value' => '10'],
            ['type' => 'WFH', 'value' => '10'],
            ['type' => 'Izin', 'value' => '2'],
            ['type' => 'Sakit', 'value' => '2'],
            ['type' => 'Cuti', 'value' => '1'],
        ];

        foreach ($presenceTypes as $presenceType) {
            PresenceType::create($presenceType);
        }
    }
}
