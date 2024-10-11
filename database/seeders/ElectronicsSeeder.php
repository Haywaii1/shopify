<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Electronics; // Import the Product model

class ElectronicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the electronics data
        $electronics = [
            [
                'name' => 'Smartphone',
                'brand' => 'Apple',
                'model' => 'iPhone 13',
                'description' => 'Latest Apple smartphone with A15 Bionic chip.',
                'price' => 999.99,
                'image' => 'computer-img.png',
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'warranty_period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop',
                'brand' => 'Apple',
                'model' => 'iPhone 13',
                'description' => 'Latest Apple smartphone with A15 Bionic chip.',
                'price' => 999.99,
                'image' => 'laptop-img.png',
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'warranty_period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Television',
                'brand' => 'Apple',
                'model' => 'iPhone 13',
                'description' => 'Latest Apple smartphone with A15 Bionic chip.',
                'price' => 999.99,
                'image' => 'mobile-img.png',
                'long_description' => 'This is a longer description for sample product 2.',
                'material' => 'Polyester',
                'dimensions' => '15x15x10 inches',
                'weight' => '1.5 kg',
                'warranty_period' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into 'electronics' table
        DB::table('electronics')->insert($electronics);

        // Loop through each electronic item and create/update the corresponding Product
        foreach ($electronics as $electronicData) {
            Electronics::updateOrCreate(
                ['name' => $electronicData['name']], // Check for the product by name
                [
                    'brand' => $electronicData['brand'],
                    'model' => $electronicData['model'],
                    'description' => $electronicData['description'],
                    'price' => $electronicData['price'],
                    'image' => $electronicData['image'],
                    'long_description' => $electronicData['long_description'],
                    'material' => $electronicData['material'],
                    'dimensions' => $electronicData['dimensions'],
                    'weight' => $electronicData['weight'],
                    'warranty_period' => $electronicData['warranty_period'],
                    'created_at' => $electronicData['created_at'],
                    'updated_at' => $electronicData['updated_at'],
                ]
            );
        }
    }
}
