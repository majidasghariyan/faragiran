<?php

namespace App\Repositories\course;

use App\Models\Course;
use App\Models\Lesson;
use App\Repositories\course\CourseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;



class CourseRepository implements CourseRepositoryInterface
{

    public function get_all()
    {
        return Course::orderByDesc('id')->paginate(15)->appends(request()->except('page'));
    }
    public function updateCourse($request, $course)
    {
        $course->update([
            'price' => $request->price,
        ]);

    }

    public function addLessonCourse($request, $course)
    {
        $lesson = new Lesson([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        $course->lessons()->save($lesson);

    }
}
