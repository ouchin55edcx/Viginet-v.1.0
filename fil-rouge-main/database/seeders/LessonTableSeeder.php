<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = Lesson::factory()->count(6)->create();

        foreach ($lessons as $lesson) {
            $image = Image::factory()->create();
            $lesson->image_id = $image->id;
            $lesson->save();
        }
    }
}
