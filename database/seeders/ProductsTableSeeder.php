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
        $products = [
            [
            'name' => 'jumkas',
            'brand' => 'Gucchi',
            'model' => 'banglees',
             'description' => 'This is a sample product description.',
             'price' => 49.89,
             'image' => 'jhumka-img.png',
             'long_description' => 'This is a longer description for sample product 1.',
             'material' => 'Cotton',
             'dimensions' => '10x10x5 inches',
             'weight' => '1.2 kg',
             'warranty_period' => 2,
             'created_at' => now(),
             'updated_at' => now()
            ],

            ['name' => 'necklaces',
            'brand' => 'LV',
            'model' => 'Leg Chain',
            'description' => 'This is another sample product description.',
            'price' => 29.99, 'stock' => 30,
            'image' => 'neklesh-img.png',
            'long_description' => 'This is a longer description for sample product 2.',
            'material' => 'Polyester',
            'dimensions' => '15x15x10 inches',
            'weight' => '1.5 kg',
            'warranty_period' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],
            ['name' => 'kagans',
            'brand' => 'Tommy',
            'model' => 'ring',
            'description' => 'This is another sample product description.',
            'price' => 29.99,
            'image' => 'kangan-img.png',
            'long_description' => 'This is a longer description for sample product 3.',
            'material' => 'Polyester',
            'dimensions' => '15x15x10 inches',
            'weight' => '1.5 kg',
            'warranty_period' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],

            // ['name' => 'tshirt', 'description' => 'A luxury T-shirt.', 'price' => 499.99, 'stock' => 10, 'image' => 'tshirt-img.png', 'category_id' => 4, 'long_description' => 'This stunning T-shirt is a statement of luxury and elegance.', 'material' => 'Cotton', 'dimensions' => 'M, L, XL', 'weight' => '0.2 kg', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'shirt', 'description' => 'A luxury shirt.', 'price' => 499.99, 'stock' => 10, 'image' => 'dress-shirt-img.png', 'category_id' => 5, 'long_description' => 'This stunning shirt is a statement of luxury and elegance.', 'material' => 'Cotton', 'dimensions' => 'M, L', 'weight' => '0.3 kg', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'gown', 'description' => 'A luxury female gown.', 'price' => 499.99, 'stock' => 10, 'image' => 'women-clothes-img.png', 'category_id' => 6, 'long_description' => 'This stunning gown is a statement of luxury and elegance.', 'material' => 'Silk', 'dimensions' => 'S, M, L', 'weight' => '0.5 kg', 'created_at' => now(), 'updated_at' => now()],
        ];



        // Loop through each product and insert or update
        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['name' => $productData['name']], // Check for the product by name
                [
                    'brand' => $productData['brand'],
                    'model' => $productData['model'],
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'image' => $productData['image'],
                    'long_description' => $productData['long_description'],
                    'material' => $productData['material'],
                    'dimensions' => $productData['dimensions'],
                    'weight' => $productData['weight'],
                    'warranty_period' => $productData['warranty_period'],
                    'created_at' => $productData['created_at'],
                    'updated_at' => $productData['updated_at'],
                ]
            );
        }
    }
}
