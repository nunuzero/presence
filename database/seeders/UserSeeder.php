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
        $users = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => 'password'],
            ['name' => 'Budi Setiawan', 'email' => 'budisetiawan@gmail.com', 'password' => 'password'],
            ['name' => 'Dimas Wijaya', 'email' => 'dimaswijaya@gmail.com', 'password' => 'password'],
            ['name' => 'Budi Santoso', 'email' => 'budisantoso@gmail.com', 'password' => 'password'],
            ['name' => 'Andi Saputra ', 'email' => 'andisaputra@gmail.com', 'password' => 'password'],
            ['name' => 'Rina Permata', 'email' => 'rinapermata@gmail.com', 'password' => 'password'],
            ['name' => 'Indah Lestari', 'email' => 'indahlestari@gmail.com', 'password' => 'password'],
            ['name' => 'Angga Pratama', 'email' => 'anggapratama@gmail.com', 'password' => 'password'],
            ['name' => 'Rizky Ramadhan', 'email' => 'rizkyramadhan@gmail.com', 'password' => 'password'],
            ['name' => 'Anugerah Ashar', 'email' => 'nunu@gmail.com', 'password' => 'password'],
            ['name' => 'Muhammad Nashir', 'email' => 'nashir@gmail.com', 'password' => 'password'],
            ['name' => 'Arif Supriyanto', 'email' => 'arif@gmail.com', 'password' => 'password'],
        ];

        User::factory()->createMany($users);
    }
}
