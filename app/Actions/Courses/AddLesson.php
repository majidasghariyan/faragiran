<?php

namespace App\Actions\Courses;

use App\Models\Lesson;

class AddLesson
{
    function handle($course, $data): void
    {
        $lesson = new Lesson([
            'name' => $data['name'],
        ]);

        $course->lessons()->save($lesson);
    }
}
