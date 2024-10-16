<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
            public function run()
        {
            $this->call(CategoriesTableSeeder::class);
            $this->call(ProductsTableSeeder::class);
            $this->call([
                ElectronicsSeeder::class,
            ]);
            $this->call([
                ClothesSeeder::class,
            ]);
        }

}
