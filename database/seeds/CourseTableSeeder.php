<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ["antipasto", "primo", "secondo", "dolce", "contorno", "burger"];
        for ($i=0; $i < count($names) ; $i++) { 
            $course = new Course;
            $course->name = $names[$i];
            $course->save();
        }
    }
}
