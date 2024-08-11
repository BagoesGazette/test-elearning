<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'course_category_id' => 1,
            'mentor_id' => 3,
            'title' => 'Laravel 11 Dasar',
            'job' => 'Software Developer',
            'time' => 60
        ]);

        Course::create([
            'course_category_id' => 1,
            'mentor_id' => 3,
            'title' => 'Dasar PHP Programming',
            'job' => 'Software Developer',
            'time' => 60
        ]);

        Course::create([
            'course_category_id' => 2,
            'mentor_id' => 4,
            'title' => 'React Js Dasar',
            'job' => 'Software Developer',
            'time' => 60
        ]);
    }
}
