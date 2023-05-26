<?php

namespace App\Actions\Courses;

use App\Models\Course;

class IndexCourses
{
    function handle()
    {
        return Course::orderByDesc('id')->paginate(15)->appends(request()->except('page'));

    }
}
