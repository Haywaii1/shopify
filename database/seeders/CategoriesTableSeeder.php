<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            // ['name' => 'jumkas', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'necklaces', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'kagans', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'tshirt', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'shirt', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'gown', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
