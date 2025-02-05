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
        $this->call([
            SettingLocalizationSeeder::class,
            UserSeeder::class,
            WorkTimeSeeder::class,
            PresenceTypeSeeder::class,
            LogBookSeeder::class,
            PositionSeeder::class,
            StaffSeeder::class,
            WfhScheduleSeeder::class,
            PresenceSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            ModelHasRoleSeeder::class,
        ]);
    }
}
