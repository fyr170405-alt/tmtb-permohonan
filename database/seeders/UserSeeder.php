<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Kunuuzul',
                'email' => 'admin@kunuuzul.test',
                'username' => 'admin',
                'role' => 'admin',
                'password' => 'admin123',
            ],
            [
                'name' => 'PJGT Kunuuzul',
                'email' => 'pjgt@kunuuzul.test',
                'username' => 'pjgt001',
                'role' => 'pjgt',
                'password' => 'pjgt123',
            ],
            [
                'name' => 'Guru Tugas',
                'email' => 'gt@kunuuzul.test',
                'username' => 'gt001',
                'role' => 'gt',
                'password' => 'gt123456',
            ],
            [
                'name' => 'UBAIDILLAH',
                'email' => 'ubaid@kunuuzul.test',
                'username' => '00007',
                'role' => 'pjgt',
                'password' => 'password',
            ],
        ];

        foreach ($users as $u) {
            User::updateOrCreate(['email' => $u['email']], $u);
        }
    }
}
