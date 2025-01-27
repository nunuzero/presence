<?php

namespace Database\Seeders;

use App\Models\Presence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $presences = [
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-1 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-2 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-3 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-4 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-5 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-7 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-8 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-9 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-10', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-11', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-12', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-14', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-15', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '3', 'date' => '2024-10-16', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-17', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-18', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-19', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-21', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-22', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-23', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-24', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-25', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-10-26', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-28', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-29', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-30', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-10-31', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-1 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-1 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-1 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-2 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-2 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-2 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-4 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-4 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-4 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-5 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-5 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-5 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-6 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-6 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-6 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-7 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-7 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-7 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-8 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-8 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-8 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-9 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-9 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-9 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-11', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-11', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-11', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-12', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-12', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-12', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-13', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-13', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-13', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-14', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-14', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-14', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-15', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-15', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-15', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-16', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-16', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-16', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-18', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-18', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-18', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-19', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-19', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-19', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-20', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-20', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-20', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-21', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-21', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-21', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-22', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-22', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-22', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-23', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-23', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-23', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-25', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-25', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-25', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-26', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-11-26', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-26', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-11-28', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '4', 'date' => '2024-11-28', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-11-28', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-29', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-29', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-29', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-11-30', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-11-30', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-11-30', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-2 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-2 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-2 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-3 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-3 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-3 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '3', 'date' => '2024-12-4 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-4 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-4 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-5 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-5 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-5 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-6 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-6 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-6 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-7 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-7 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-7 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-9 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-9 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-9 ', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-10', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-10', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-10', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-11', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-11', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-11', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-12', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-12', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-12', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-13', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-13', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-13', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-14', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-14', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '5', 'date' => '2024-12-14', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-16', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-16', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-16', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-17', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-17', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-17', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-18', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-18', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-18', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-19', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-19', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-19', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-20', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-20', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-12-20', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-21', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-21', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-12-21', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],

            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-23', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-23', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-23', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-24', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-24', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-24', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '1', 'date' => '2024-12-26', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '1', 'date' => '2024-12-26', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '1', 'date' => '2024-12-26', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-27', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-27', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-12-27', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '1', 'presence_type_id' => '2', 'date' => '2024-12-28', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '2', 'presence_type_id' => '2', 'date' => '2024-12-28', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            ['user_id' => '3', 'presence_type_id' => '2', 'date' => '2024-12-28', 'time_arrived' => '08:00:00', 'return_time' => '17:00:00'],
            
        ];

        foreach ($presences as $presence) {
            Presence::create($presence);
        }
    }
}
