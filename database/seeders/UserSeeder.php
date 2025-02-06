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
            ['name' => 'Budi Setiawan', 'email' => 'budisetiawan@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-1.jpeg'],
            ['name' => 'Dimas Wijaya', 'email' => 'dimaswijaya@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-2.jpeg'],
            ['name' => 'Budi Santoso', 'email' => 'budisantoso@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-3.jpeg'],
            ['name' => 'Andi Saputra ', 'email' => 'andisaputra@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-4.jpeg'],
            ['name' => 'Rina Permata', 'email' => 'rinapermata@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-5.jpeg'],
            ['name' => 'Indah Lestari', 'email' => 'indahlestari@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-6.jpeg'],
            ['name' => 'Angga Pratama', 'email' => 'anggapratama@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-7.jpeg'],
            ['name' => 'Rizky Ramadhan', 'email' => 'rizkyramadhan@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-8.jpeg'],
            ['name' => 'Anugerah Ashar', 'email' => 'nunu@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-9.jpeg'],
            ['name' => 'Muhammad Nashir', 'email' => 'nashir@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-10.jpeg'],
            ['name' => 'Arif Supriyanto', 'email' => 'arif@gmail.com', 'password' => 'password', 'profile_image' => 'profile_image/example-staff-11.jpeg'],
        ];

        User::factory()->createMany($users);
    }
}
