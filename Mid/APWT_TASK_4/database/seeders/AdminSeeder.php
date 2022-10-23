<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '1234',

        ]);
    }
}
