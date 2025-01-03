<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Nunu',
            'email' => 'nunu@gmail.com',
            'password' => 'nunu123',
        ]);

        User::factory()->create([
            'name' => 'Nashir',
            'email' => 'nashir@gmail.com',
            'password' => 'nashir123',
        ]);

        User::factory()->create([
            'name' => 'Arif',
            'email' => 'arif@gmail.com',
            'password' => 'arif123',
        ]);
    }
}
