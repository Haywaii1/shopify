<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Clothes;

class ClothesSeeder extends Seeder
{
    public function run(): void
    {
        $clothes = [
            [
                'name' => 'Tshirt',
                'brand' => 'Nike',
                'model' => 'Round Neck',
                'description' => 'A new elestic sport wear.',
                'price' => 999.99,
                'image' => 'tshirt-img.png',
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'warranty_period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shirt',
                'brand' => 'LV',
                'model' => 'Office shirt',
                'description' => 'This is an office shirt.',
                'price' => 999.99,
                'image' => 'dress-shirt-img.png',
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'warranty_period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gown',
                'brand' => 'Women Gown',
                'model' => 'elites',
                'description' => 'This is a beautiful dinner gown.',
                'price' => 999.99,
                'image' => 'women-clothes-img.png',
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'warranty_period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        // Insert data into 'clothes' table
        DB::table('clothes')->insert($clothes);

        // Loop through each electronic item and create/update the corresponding Product
        foreach ($clothes as $clotheData) {
            Clothes::updateOrCreate(
                ['name' => $clotheData['name']], // Check for the product by name
                [
                    'brand' => $clotheData['brand'],
                    'model' => $clotheData['model'],
                    'description' => $clotheData['description'],
                    'price' => $clotheData['price'],
                    'image' => $clotheData['image'],
                    'long_description' => $clotheData['long_description'],
                    'material' => $clotheData['material'],
                    'dimensions' => $clotheData['dimensions'],
                    'weight' => $clotheData['weight'],
                    'warranty_period' => $clotheData['warranty_period'],
                    'created_at' => $clotheData['created_at'],
                    'updated_at' => $clotheData['updated_at'],
                ]
            );
        }
}
}
