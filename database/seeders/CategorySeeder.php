<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Category::factory(20)->create();
        Category::create([
            "name" => "Cottage",
            "slug" => "cottage",
            "icon" => '<span class="mdi mdi-home-analytics"></span>'
        ]);
        Category::create([
            "name" => "Villa",
            "slug" => "villa",
            "icon" => '<span class="mdi mdi-home-battery"></span>'
        ]);
        Category::create([
            "name" => "Hotel",
            "slug" => "hotel",
            "icon" => '<span class="mdi mdi-home-city-outline"></span>'
        ]);
        Category::create([
            "name" => "Motel",
            "slug" => "motel",
            "icon" => '<span class="mdi mdi-home-silo-outline"></span>'
        ]);
        Category::create([
            "name" => "Apartment",
            "slug" => "apartment",
            "icon" => '<span class="mdi mdi-home-modern"></span>'
        ]);
    }
}
