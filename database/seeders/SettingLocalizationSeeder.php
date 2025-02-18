<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Setting\Localization;
use Illuminate\Support\Facades\Hash;

class SettingLocalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Localization::create([
            'language' => 'id',
            'timezone' => 'Asia/Makassar',
        ]);
    }
}
