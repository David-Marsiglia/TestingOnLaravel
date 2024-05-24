<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{

    public function run()
    {
        Category::create(['name' => 'Tecnología']);
		Category::create(['name' => 'Electrodomésticos']);
		Category::create(['name' => 'Hogar y Muebles']);
		Category::create(['name' => 'Deportes y Fitness']);
		Category::create(['name' => 'Juegos y Juguetes']);
    }
}
