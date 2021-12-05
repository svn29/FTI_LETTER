<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            [
                'username' => 'katonwijana',
                'nama' => 'Katon Wijana',
                'no_induk' => 119022,
                'no_hp' => '081315927777',
                'email' => 'dosen@gmail.com',
                'password' => bcrypt(123456),
                'role' => 'dosen'
            ],
            [
                'username' => 'anto123',
                'nama' => 'Aldi Widodo',
                'no_induk' => 119022,
                'no_hp' => '08954121111',
                'email' => 'mahasiswa@gmail.com',
                'password' => bcrypt(123456),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'andi123',
                'nama' => 'Aldi Widodo',
                'no_induk' => 119022,
                'no_hp' => '08954121111',
                'email' => 'admin@gmail.com',
                'password' => bcrypt(123456),
                'role' => 'admin'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
