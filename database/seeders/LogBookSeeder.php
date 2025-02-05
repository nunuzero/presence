<?php

namespace Database\Seeders;

use App\Models\LogBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 2; $i <= 2; $i++) {
            $logBooks = [
                ['user_id' => $i, 'date' => '2024-8-8', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-9', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-10', 'work' => "- Pekerjaan manajer proyek di project 1"],

                ['user_id' => $i, 'date' => '2024-8-12', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-13', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-14', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-15', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-16', 'work' => "- Pekerjaan manajer proyek di project 1"],
                // ---------------------------------------------------------------------------------------------------------------------------

                ['user_id' => $i, 'date' => '2024-8-19', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-20', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-21', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-22', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-23', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-24', 'work' => "- Pekerjaan manajer proyek di project 1"],

                ['user_id' => $i, 'date' => '2024-8-26', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-27', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-28', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-29', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-30', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-8-31', 'work' => "- Pekerjaan manajer proyek di project 1"],

                ['user_id' => $i, 'date' => '2024-9-2', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-3', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-4', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-5', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-6', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-7', 'work' => "- Pekerjaan manajer proyek di project 1"],

                ['user_id' => $i, 'date' => '2024-9-9', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-10', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-11', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-12', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-13', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-14', 'work' => "- Pekerjaan manajer proyek di project 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-9-17', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-18', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-19', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-20', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-21', 'work' => "- Pekerjaan manajer proyek di project 1"],

                ['user_id' => $i, 'date' => '2024-9-23', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-24', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-25', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-26', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-27', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-9-28', 'work' => "- Pekerjaan manajer proyek di project 1"],

                ['user_id' => $i, 'date' => '2024-9-30', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-10-1', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-10-2', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-10-3', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-10-4', 'work' => "- Pekerjaan manajer proyek di project 1"],
                ['user_id' => $i, 'date' => '2024-10-5', 'work' => "- Pekerjaan manajer proyek di project 1"],

                ['user_id' => $i, 'date' => '2024-10-7', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-8', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-9', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-10', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-11', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-12', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],

                ['user_id' => $i, 'date' => '2024-10-14', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-15', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-16', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-17', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-18', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-19', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],

                ['user_id' => $i, 'date' => '2024-10-21', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-22', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-23', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-24', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-25', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-26', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],

                ['user_id' => $i, 'date' => '2024-10-28', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-29', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-30', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-10-31', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-1', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-2', 'work' => "- Pekerjaan manajer proyek di project 1\n- Pekerjaan manajer proyek di project 2"],

                ['user_id' => $i, 'date' => '2024-11-4', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-5', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-6', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-7', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-8', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-9', 'work' => "- Pekerjaan manajer proyek di project 2"],

                ['user_id' => $i, 'date' => '2024-11-11', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-12', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-13', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-14', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-15', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-16', 'work' => "- Pekerjaan manajer proyek di project 2"],

                ['user_id' => $i, 'date' => '2024-11-18', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-19', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-20', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-21', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-22', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-23', 'work' => "- Pekerjaan manajer proyek di project 2"],

                ['user_id' => $i, 'date' => '2024-11-25', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-26', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-27', 'work' => "- Pekerjaan manajer proyek di project 2"],
                ['user_id' => $i, 'date' => '2024-11-28', 'work' => "- Pekerjaan manajer proyek di project 2\n- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-11-29', 'work' => "- Pekerjaan manajer proyek di project 2\n- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-11-30', 'work' => "- Pekerjaan manajer proyek di project 2\n- Pekerjaan manajer proyek di project 3"],

                ['user_id' => $i, 'date' => '2024-12-2', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-3', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-4', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-5', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-6', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-7', 'work' => "- Pekerjaan manajer proyek di project 3"],

                ['user_id' => $i, 'date' => '2024-12-9', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-10', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-11', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-12', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-13', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-14', 'work' => "- Pekerjaan manajer proyek di project 3"],

                ['user_id' => $i, 'date' => '2024-12-16', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-17', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-18', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-19', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-20', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-21', 'work' => "- Pekerjaan manajer proyek di project 3"],

                ['user_id' => $i, 'date' => '2024-12-23', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-24', 'work' => "- Pekerjaan manajer proyek di project 3"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-12-26', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-27', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-28', 'work' => "- Pekerjaan manajer proyek di project 3"],

                ['user_id' => $i, 'date' => '2024-12-30', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2024-12-31', 'work' => "- Pekerjaan manajer proyek di project 3"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-2', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2025-1-3', 'work' => "- Pekerjaan manajer proyek di project 3"],
                ['user_id' => $i, 'date' => '2025-1-4', 'work' => "- Pekerjaan manajer proyek di project 3"],

                ['user_id' => $i, 'date' => '2025-1-6', 'work' => "- Pekerjaan manajer proyek di project 3\n- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-7', 'work' => "- Pekerjaan manajer proyek di project 3\n- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-8', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-9', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-10', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-11', 'work' => "- Pekerjaan manajer proyek di project 4"],

                ['user_id' => $i, 'date' => '2025-1-13', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-14', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-15', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-16', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-17', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-18', 'work' => "- Pekerjaan manajer proyek di project 4"],

                ['user_id' => $i, 'date' => '2025-1-20', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-21', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-22', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-23', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-24', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-25', 'work' => "- Pekerjaan manajer proyek di project 4"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-28', 'work' => "- Pekerjaan manajer proyek di project 4"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-30', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-1-31', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-2-1', 'work' => "- Pekerjaan manajer proyek di project 4"],

                ['user_id' => $i, 'date' => '2025-2-3', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-2-4', 'work' => "- Pekerjaan manajer proyek di project 4"],
                ['user_id' => $i, 'date' => '2025-2-5', 'work' => "- Pekerjaan manajer proyek di project 4"],
            ];

            foreach ($logBooks as $logbook) {
                LogBook::create($logbook);
            }
        }

        for ($i = 3; $i <= 4; $i++) {
            $logBooks = [
                ['user_id' => $i, 'date' => '2024-8-8', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-8-9', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-10', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-8-12', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3\n - Pekerjaan programmer web 4"],
                ['user_id' => $i, 'date' => '2024-8-13', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-14', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-15', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-16', 'work' => "- Pekerjaan programmer web 1"],
                // ---------------------------------------------------------------------------------------------------------------------------

                ['user_id' => $i, 'date' => '2024-8-19', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-20', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-21', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-22', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-8-23', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-8-24', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],

                ['user_id' => $i, 'date' => '2024-8-26', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-27', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-28', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-29', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-30', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-8-31', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-9-2', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-9-3', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-9-4', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-5', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-6', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-7', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-9-9', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2024-9-10', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-9-11', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-9-12', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-13', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-14', 'work' => "- Pekerjaan programmer web 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-9-17', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-18', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-19', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-20', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-21', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-9-23', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2024-9-24', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-9-25', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-26', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-9-27', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-9-28', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-9-30', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-1', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-2', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-3', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-4', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-5', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-10-7', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-8', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-9', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-10', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-11', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-12', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-10-14', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-15', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-10-16', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-10-17', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-18', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-19', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-10-21', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-22', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-23', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-24', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-25', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-10-26', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-10-28', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-10-29', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2024-10-30', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-10-31', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-11-1', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-2', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-11-4', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-5', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-6', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-7', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2024-11-8', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3\n - Pekerjaan programmer web 4"],
                ['user_id' => $i, 'date' => '2024-11-9', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],

                ['user_id' => $i, 'date' => '2024-11-11', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-12', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-13', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-14', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-15', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-16', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-11-18', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2024-11-19', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-11-20', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-21', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-22', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-23', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-11-25', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-26', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-27', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-11-28', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-29', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-11-30', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-12-2', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-12-3', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3\n - Pekerjaan programmer web 4"],
                ['user_id' => $i, 'date' => '2024-12-4', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-12-5', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-12-6', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-7', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-12-9', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-10', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-11', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-12', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-13', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-14', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-12-16', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-17', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-12-18', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2024-12-19', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-20', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-21', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-12-23', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-24', 'work' => "- Pekerjaan programmer web 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-12-26', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2024-12-27', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2024-12-28', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2024-12-30', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2024-12-31', 'work' => "- Pekerjaan programmer web 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-2', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-3', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2025-1-4', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],

                ['user_id' => $i, 'date' => '2025-1-6', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-7', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-8', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-9', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-10', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-11', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],

                ['user_id' => $i, 'date' => '2025-1-13', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-14', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-15', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-16', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3"],
                ['user_id' => $i, 'date' => '2025-1-17', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-18', 'work' => "- Pekerjaan programmer web 1"],

                ['user_id' => $i, 'date' => '2025-1-20', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-21', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-22', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2\n - Pekerjaan programmer web 3\n - Pekerjaan programmer web 4"],
                ['user_id' => $i, 'date' => '2025-1-23', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2025-1-24', 'work' => "- Pekerjaan programmer web 1"],
                ['user_id' => $i, 'date' => '2025-1-25', 'work' => "- Pekerjaan programmer web 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-28', 'work' => "- Pekerjaan programmer web 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-30', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2025-1-31', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2025-2-1', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],

                ['user_id' => $i, 'date' => '2025-2-3', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2025-2-4', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
                ['user_id' => $i, 'date' => '2025-2-5', 'work' => "- Pekerjaan programmer web 1\n - Pekerjaan programmer web 2"],
            ];

            foreach ($logBooks as $logbook) {
                LogBook::create($logbook);
            }
        }

        for ($i = 5; $i <= 6; $i++) {
            $logBooks = [
                ['user_id' => $i, 'date' => '2024-8-19', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-8-20', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-8-21', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-8-22', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-8-23', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-8-24', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3\n- Pekerjaan programmer 4"],

                ['user_id' => $i, 'date' => '2024-8-26', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-8-27', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-8-28', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-8-29', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-8-30', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-8-31', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-9-2', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-3', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-4', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-5', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-6', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-7', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-9-9', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-10', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-11', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-9-12', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-13', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-14', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-9-17', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-9-18', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-9-19', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-9-20', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-9-21', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-9-23', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-24', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-25', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-9-26', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-27', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-9-28', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-9-30', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-1', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-10-2', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-3', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-4', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-10-5', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],

                ['user_id' => $i, 'date' => '2024-10-7', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-8', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-9', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-10', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-11', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-10-12', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],

                ['user_id' => $i, 'date' => '2024-10-14', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-15', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-10-16', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-17', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-10-18', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-19', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-10-21', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-22', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-10-23', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-10-24', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-25', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-26', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-10-28', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-29', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-30', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-10-31', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-1', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-2', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-11-4', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-5', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-11-6', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-7', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-8', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-9', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-11-11', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-11-12', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3\n- Pekerjaan programmer 4"],
                ['user_id' => $i, 'date' => '2024-11-13', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-11-14', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-11-15', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2024-11-16', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-11-18', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-19', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-20', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-21', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-22', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-23', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-11-25', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-26', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-27', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-28', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-11-29', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-11-30', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],

                ['user_id' => $i, 'date' => '2024-12-2', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-3', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-4', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-5', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-6', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-7', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-12-9', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-10', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-11', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-12-12', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-12-13', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2024-12-14', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],

                ['user_id' => $i, 'date' => '2024-12-16', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-17', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-18', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-19', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-20', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-21', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-12-23', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-24', 'work' => "- Pekerjaan programmer 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-12-26', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-27', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-28', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2024-12-30', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2024-12-31', 'work' => "- Pekerjaan programmer 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-2', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-3', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2025-1-4', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],

                ['user_id' => $i, 'date' => '2025-1-6', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2025-1-7', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-8', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-9', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-10', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2025-1-11', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],

                ['user_id' => $i, 'date' => '2025-1-13', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-14', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-15', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-16', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-17', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-18', 'work' => "- Pekerjaan programmer 1"],

                ['user_id' => $i, 'date' => '2025-1-20', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-21', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-22', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-23', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-24', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2025-1-25', 'work' => "- Pekerjaan programmer 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-28', 'work' => "- Pekerjaan programmer 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-30', 'work' => "- Pekerjaan programmer 1"],
                ['user_id' => $i, 'date' => '2025-1-31', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],
                ['user_id' => $i, 'date' => '2025-2-1', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2"],

                ['user_id' => $i, 'date' => '2025-2-3', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3"],
                ['user_id' => $i, 'date' => '2025-2-4', 'work' => "- Pekerjaan programmer 1\n- Pekerjaan programmer 2\n- Pekerjaan programmer 3\n- Pekerjaan programmer 4"],
                ['user_id' => $i, 'date' => '2025-2-5', 'work' => "- Pekerjaan programmer 1"],
            ];

            foreach ($logBooks as $logbook) {
                LogBook::create($logbook);
            }
        }

        for ($i = 7; $i <= 8; $i++) {
            $logBooks = [
                ['user_id' => $i, 'date' => '2024-9-2', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-9-3', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-4', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-9-9', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-10', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-11', 'work' => "- Pekerjaan 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-9-17', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-18', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-9-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-24', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-25', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-9-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-1', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-2', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-7', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-8', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-9', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-10-14', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-15', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-16', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-21', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-22', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-23', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-28', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-29', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-11-4', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-5', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-6', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-11-11', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-12', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-13', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-11-18', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-19', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3\n- Pekerjaan 4"],
                ['user_id' => $i, 'date' => '2024-11-20', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-11-25', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-26', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-27', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-12-2', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-3', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-4', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-12-9', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-10', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-11', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],

                ['user_id' => $i, 'date' => '2024-12-16', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-17', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-18', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-12-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-24', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                // ---------------------------------------------------------------------------------------------------------------------------

                ['user_id' => $i, 'date' => '2024-12-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-12-31', 'work' => "- Pekerjaan 1"],
                // ---------------------------------------------------------------------------------------------------------------------------

                ['user_id' => $i, 'date' => '2025-1-6', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-7', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-8', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2025-1-13', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-14', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-15', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2025-1-20', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-21', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-22', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-28', 'work' => "- Pekerjaan 1"],
                // ---------------------------------------------------------------------------------------------------------------------------

                ['user_id' => $i, 'date' => '2025-2-3', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-2-4', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-2-5', 'work' => "- Pekerjaan 1"],
            ];

            foreach ($logBooks as $logbook) {
                LogBook::create($logbook);
            }
        }

        for ($i = 9; $i <= 9; $i++) {
            $logBooks = [
                ['user_id' => $i, 'date' => '2024-9-2', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-9-3', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-4', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-5', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-6', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-7', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-9-9', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-10', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-11', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-12', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-13', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-14', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-9-17', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-18', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-19', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-20', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-21', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-9-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-24', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-25', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-26', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-27', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-28', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-9-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-1', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-2', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-3', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-4', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-5', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-7', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-8', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-9', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-10', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-11', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-12', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-14', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-15', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-16', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-17', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-18', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-19', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-21', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-22', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-24', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-25', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-26', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-28', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-29', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-31', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3\n- Pekerjaan 4"],
                ['user_id' => $i, 'date' => '2024-11-1', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-11-2', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-11-4', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-5', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-6', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-7', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-8', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-9', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-11-11', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-12', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-13', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-14', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-15', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-16', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-11-18', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-19', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3\n- Pekerjaan 4"],
                ['user_id' => $i, 'date' => '2024-11-20', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-21', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-22', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-11-23', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-11-25', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-26', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-27', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-28', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-29', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-30', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-12-2', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-3', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-4', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-5', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-6', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-7', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-12-9', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-10', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-11', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-12-12', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-12-13', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-14', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-12-16', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-17', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-18', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-19', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-12-20', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-12-21', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-12-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-24', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-12-26', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-12-27', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-12-28', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-12-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-12-31', 'work' => "- Pekerjaan 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-2', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-3', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-4', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],

                ['user_id' => $i, 'date' => '2025-1-6', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-7', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-8', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-9', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-10', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-11', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2025-1-13', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-14', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-15', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-16', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-17', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-18', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2025-1-20', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-21', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-22', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2025-1-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-24', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-25', 'work' => "- Pekerjaan 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-28', 'work' => "- Pekerjaan 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2025-1-31', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-2-1', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2025-2-3', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-2-4', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-2-5', 'work' => "- Pekerjaan 1"],
            ];

            foreach ($logBooks as $logbook) {
                LogBook::create($logbook);
            }
        }

        for ($i = 10; $i <= 12; $i++) {
            $logBooks = [
                ['user_id' => $i, 'date' => '2024-9-2', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-9-3', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-4', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3\n- Pekerjaan 4"],
                ['user_id' => $i, 'date' => '2024-9-5', 'work' => "- Pekerjaan 1"],
                

                ['user_id' => $i, 'date' => '2024-9-9', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-10', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-9-11', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-12', 'work' => "- Pekerjaan 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-9-17', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-18', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-19', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],


                ['user_id' => $i, 'date' => '2024-9-23', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-9-24', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-25', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-9-26', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-9-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-1', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-2', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-3', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-7', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-8', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-9', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-10', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-14', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-10-15', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-16', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-17', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-21', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-22', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-24', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-10-28', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-10-29', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-10-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-10-31', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3\n- Pekerjaan 4"],

                ['user_id' => $i, 'date' => '2024-11-4', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-5', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-6', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-7', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-11-11', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-12', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-11-13', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-14', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-11-18', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-19', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3\n- Pekerjaan 4"],
                ['user_id' => $i, 'date' => '2024-11-20', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-21', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-11-25', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-26', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-27', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2024-11-28', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-12-2', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-12-3', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-4', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-5', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2024-12-9', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-10', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-11', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-12-12', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-12-16', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-12-17', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-18', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-19', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-12-23', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2024-12-24', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2024-12-26', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2024-12-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2024-12-31', 'work' => "- Pekerjaan 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-2', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3\n- Pekerjaan 4"],

                ['user_id' => $i, 'date' => '2025-1-6', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-7', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-8', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-9', 'work' => "- Pekerjaan 1"],

                ['user_id' => $i, 'date' => '2025-1-13', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-14', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-15', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-1-16', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],

                ['user_id' => $i, 'date' => '2025-1-20', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-21', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-1-22', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],
                ['user_id' => $i, 'date' => '2025-1-23', 'work' => "- Pekerjaan 1"],

                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-28', 'work' => "- Pekerjaan 1"],
                // ---------------------------------------------------------------------------------------------------------------------------
                ['user_id' => $i, 'date' => '2025-1-30', 'work' => "- Pekerjaan 1\n- Pekerjaan 2\n- Pekerjaan 3"],

                ['user_id' => $i, 'date' => '2025-2-3', 'work' => "- Pekerjaan 1"],
                ['user_id' => $i, 'date' => '2025-2-4', 'work' => "- Pekerjaan 1\n- Pekerjaan 2"],
                ['user_id' => $i, 'date' => '2025-2-5', 'work' => "- Pekerjaan 1"],
            ];

            foreach ($logBooks as $logbook) {
                LogBook::create($logbook);
            }
        }
    }
}
