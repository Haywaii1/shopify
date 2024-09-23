<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'jumkas',
                'description' => 'This is a sample product description.',
                'price' => 49.89,
                'stock' => 100,
                'image' => 'jhumka-img-png',
                'category_id' => 1,  // Assuming the category with ID 1 exists
                'long_description' => 'This is a longer description for sample product 1.',
                'material' => 'Cotton',
                'dimensions' => '10x10x5 inches',
                'weight' => '1.2 kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'necklaces',
                'description' => 'This is another sample product description.',
                'price' => 29.99,
                'stock' => 30,
                'image' => 'neklesh-img.png',
                'category_id' => 2,  // Assuming the category with ID 2 exists
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'kagans',
                'description' => 'This is another sample product description.',
                'price' => 29.99,
                'stock' => 40,
                'image' => 'kangan-img.png',
                'category_id' => 3,  // Assuming the category with ID 2 exists
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'tshirt',
                'description' => 'A luxury T-shirt.',
                'price' => 499.99,
                'stock' => 10,
                'image' => 'tshirt-img.png',
                'category_id' => 4,  // 'rings' category
                'long_description' => 'This stunning diamond ring is a statement of luxury and elegance.',
                'material' => 'Diamond',
                'dimensions' => '1x1x1 inches',
                'weight' => '0.05 kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'shirt',
                'description' => 'A luxury shirt.',
                'price' => 499.99,
                'stock' => 10,
                'image' => 'dress-shirt-img.png',
                'category_id' => 5,  // 'rings' category
                'long_description' => 'This stunning diamond ring is a statement of luxury and elegance.',
                'material' => 'Diamond',
                'dimensions' => '1x1x1 inches',
                'weight' => '0.05 kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'gown',
                'description' => 'A luxury female gown.',
                'price' => 499.99,
                'stock' => 10,
                'image' => 'women-clothes-img.png',
                'category_id' => 6,  // 'rings' category
                'long_description' => 'This stunning diamond ring is a statement of luxury and elegance.',
                'material' => 'Diamond',
                'dimensions' => '1x1x1 inches',
                'weight' => '0.05 kg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // Add more products as needed
        ]);
    }
}
