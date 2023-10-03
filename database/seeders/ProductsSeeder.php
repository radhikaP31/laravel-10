<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productsData = [
            [
                'product_category_id' => 1,
                'name' => 'Bhagvad Gita',
                'price' => '250',
                'description' => 'A',
                'image' => 'bhagvad-geeta.jpg',
                'tag' => 'book,historic',
            ],
            [
                'product_category_id' => 2,
                'name' => 'Dell Laptop',
                'price' => '60000',
                'description' => 'Laptop',
                'image' => 'laptop.jpg',
                'tag' => 'electonic,gadget,helping,laptop',
            ],
            [
                'product_category_id' => 2,
                'name' => 'Samsung Mobile',
                'price' => '50000',
                'description' => 'Mobile',
                'image' => 'mobile.jpeg',
                'tag' => 'electonic,gadget,helping,mobile',
            ],
            [
                'product_category_id' => 3,
                'name' => 'Women ethenic wear',
                'price' => 5000,
                'description' => 'Women ethenic wear',
                'image' => 'women-ethanic.jpeg',
                'tag' => 'ethenic,local,trending',
            ],
            [
                'product_category_id' => 3,
                'name' => 'Shoes',
                'price' => 500,
                'description' => 'Footwear for all',
                'image' => 'shoes.jpeg',
                'tag' => 'confortable,walk,shoes',
            ],
            [
                'product_category_id' => 4,
                'name' => 'Car Toy',
                'price' => 10000,
                'description' => 'Electric car for kids',
                'image' => 'car-topy.jpeg',
                'tag' => 'electric,toy,kids,car',
            ],
            [
                'product_category_id' => 5,
                'name' => 'Winter cream',
                'price' => 100,
                'description' => 'Winter cream',
                'image' => 'winter-cream.jpeg',
                'tag' => 'cream,care,personal',
            ],
            [
                'product_category_id' => 6,
                'name' => 'Sports Equipment',
                'price' => 1200,
                'description' => 'Sports Equipment',
                'image' => 'Sports-Equipment.jpeg',
                'tag' => 'fitness,man,women,health',
            ],
            [
                'product_category_id' => 7,
                'name' => 'Electric Gyser',
                'price' => 5000,
                'description' => 'Electric Gyser',
                'image' => 'gyser.jpeg',
                'tag' => 'bath,heater,gyser',
            ],
            [
                'product_category_id' => 8,
                'name' => 'Gold Ring',
                'price' => 45000,
                'description' => 'Gold Ring',
                'image' => 'ring.jpeg',
                'tag' => 'gold,ring',
            ],
            [
                'product_category_id' => 9,
                'name' => 'DIY & Home Improvement',
                'price' => 10000,
                'description' => 'DIY & Home Improvement',
                'image' => 'diy.jpeg',
                'tag' => 'home,kitchen',
            ],
            [
                'product_category_id' => 10,
                'name' => 'Furniture & Homeware',
                'price' => 69000,
                'description' => 'Furniture & Homeware',
                'image' => 'furniture.jpeg',
                'tag' => 'home,furniture,decore',
            ],
            [
                'product_category_id' => 11,
                'name' => 'Grocery',
                'price' => 6500,
                'description' => 'Grocery',
                'image' => 'grocery.jpeg',
                'tag' => 'store,grocery',
            ],
        ];

        DB::table('products')->insert($productsData);
    }
}
