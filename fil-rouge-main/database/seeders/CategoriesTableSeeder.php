<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::factory()->count(6)->create();

        foreach ($categories as $category) {
            $image = Image::factory()->create();
            $category->image_id = $image->id;
            $category->save();
        }
    }
}