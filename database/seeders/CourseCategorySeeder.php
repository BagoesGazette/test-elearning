<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseCategory::create(['name' => 'Kelas.com']);
        CourseCategory::create(['name' => 'Kelas.work']);
        CourseCategory::create(['name' => 'Bootcamp']);
    }
}
