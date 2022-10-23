<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['username' => 'Akib',
            'email' => 'akib@gmail.com',
            'password' => '1234'],

            ['username' => 'Rick',
            'email' => 'rick@gmail.com',
            'password' => '1234'],

            ['username' => 'Fahim',
            'email' => 'fahim@gmail.com',
            'password' => '1234'],

            ['username' => 'Rifat',
            'email' => 'rifat@gmail.com',
            'password' => '1234'],

            ['username' => 'Shoiab',
            'email' => 'shoiab1@gmail.com',
            'password' => '1234']

        ];

        \App\Models\User::insert($data);
    }
}
