<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['position' => 'Manajer Proyek', 'leave_allocation' => '5', 'category' => 'Project Manager'],
            ['position' => 'Programmer Web', 'leave_allocation' => '10', 'category' => 'Programmer'],
            ['position' => 'Programmer Android', 'leave_allocation' => '10', 'category' => 'Programmer'],
            ['position' => 'Programmer Desktop', 'leave_allocation' => '10', 'category' => 'Programmer'],
            ['position' => 'Desainer', 'leave_allocation' => '10', 'category' => 'UI/UX'],
            ['position' => 'Strategi Bisnis', 'leave_allocation' => '10', 'category' => 'Support & Marketing'],
            ['position' => 'Dukungan Pelanggan', 'leave_allocation' => '10', 'category' => 'Support & Marketing'],
            ['position' => 'Anak Magang', 'leave_allocation' => '10', 'category' => 'Intern'],            
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
