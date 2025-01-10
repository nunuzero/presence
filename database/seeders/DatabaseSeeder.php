<?php

namespace Database\Seeders;

use App\Models\PresenceType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    }
}
