<?php

namespace Database\Seeders;

use app\Models\Admin;
use app\Models\User;
use app\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
       ]);
    }
}
