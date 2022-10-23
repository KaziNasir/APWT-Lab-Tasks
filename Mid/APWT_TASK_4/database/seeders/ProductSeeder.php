<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Refrigerator',
            'price' => 450,
            'category' => 'Electronics',
            'c_id' => '1',],

            ['name' => 'Vacuum cleaner',
            'price' => 250,
            'category' => 'Electronics',
            'c_id' => '1',],

            ['name' => 'Washing machine',
            'price' => 350,
            'category' => 'Electronics',
            'c_id' => '1',],

            ['name' => 'Bike',
            'price' => 990,
            'category' => 'Vehicle',
            'c_id' => '3',],

            ['name' => 'Loudspeakers x2',
            'price' => 200,
            'category' => 'Electronics',
            'c_id' => '4',],
        ];
        \App\Models\Product::insert($data);
    }
}
