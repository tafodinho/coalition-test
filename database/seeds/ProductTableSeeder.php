<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => str_random(10),
            'quantity_in_stock' => '19',
            'price' => '5000',
        ]);

        DB::table('products')->insert([
            'product_name' => str_random(10),
            'quantity_in_stock' => '19',
            'price' => '5000',
        ]);
    }
}
