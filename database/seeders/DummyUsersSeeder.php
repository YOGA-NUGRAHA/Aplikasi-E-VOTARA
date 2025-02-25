<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama' => 'Admin',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'nama' => 'siswa',
                'role' => 'siswa',
                'password' => bcrypt('password'),
            ],
            ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
