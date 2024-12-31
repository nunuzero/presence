<?php

namespace Database\Seeders;

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
            ['type' => 'Cuti', 'value' => '8'],
            ['type' => 'Izin', 'value' => '8'],
            ['type' => 'Sakit', 'value' => '5'],
            ['type' => 'Tidak Masuk', 'value' => '1'],
        ];

        DB::table('presence_types')->insert($presenceTypes);
    }
}
