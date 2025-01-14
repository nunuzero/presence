<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SettingLocalizationSeeder::class);
        $this->call(WorkTimeSeeder::class);
        $this->call(PresenceTypeSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(StaffSeeder::class);
    }
}
