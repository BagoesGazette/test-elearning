<?php

namespace Database\Seeders;

use App\Models\WatchTime;
use Illuminate\Database\Seeder;

class WatchTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WatchTime::create([
            'user_id'   => 2,
            'course_id' => 1,
            'watch_time'=> 20
        ]);

        WatchTime::create([
            'user_id'   => 2,
            'course_id' => 2,
            'watch_time'=> 50
        ]);

        WatchTime::create([
            'user_id'   => 2,
            'course_id' => 3,
            'watch_time'=> 30
        ]);
    }
}
