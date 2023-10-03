<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCategoryData = [
            [
                'name' => 'Book, Music & Video Games',
            ],
            [
                'name' => 'Electric',
            ],
            [
                'name' => 'Clothing & Footware',
            ],
            [
                'name' => 'Toys',
            ],
            [
                'name' => 'Health & Beauty',
            ],
            [
                'name' => 'Sports Equipment',
            ],
            [
                'name' => 'Household Appliances',
            ],
            [
                'name' => 'Jewelery & Watches',
            ],
            [
                'name' => 'DIY & Home Improvement',
            ],
            [
                'name' => 'Furniture & Homeware',
            ],
            [
                'name' => 'Grocery',
            ],
        ];

        DB::table('product_category')->insert($productCategoryData);
    }
}
