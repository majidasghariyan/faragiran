<?php

namespace App\Actions\Courses;


class UpdateCoursePrice
{
    function handle($course, $data): void
    {
        $course->price()->update([
            'price' => $data['price'],
        ]);
    }
}
