<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'andi123',
                'nama' => 'Aldi Widodo',
                'no_induk' => 11902218,
                'no_hp' => '08954121111',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt(123456),
                'role' => 'admin'
        ]);
    }
}
