<?php

namespace App\Http\Controllers;

use App\Actions\Courses\AddLesson;
use App\Actions\Courses\IndexCourses;
use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Courses\UpdateCoursePrice;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Requests\Course\AddLessonCourseRequest;
use App\Models\Course;
use Exception;


class CourseController extends Controller
{

    public function index(IndexCourses $action)
    {
        $title = "لیست دوره ها";
        $subtitle = "دوره ها";
        $courses = $action->handle();
        return view('admin.course.index', compact('courses', 'title', 'subtitle'));
    }

    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, UpdateCoursePrice $action, Course $course)
    {
        try {
            $data = $request->validated();
//            throw new \Error('dfgdfsdf');
            $action->handle($course, $data);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
        return redirect()->back();
        alert_message('با موفقیت ویرایش شد', 'success');

    }

    public function add_lesson(Course $course)
    {
        return view('admin.course.add', compact('course'));
    }

    public function save_lesson(AddLessonCourseRequest $request, Course $course, AddLesson $action)
    {
        try {
            $data = $request->validated();
            $action->handle($course, $data);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
        alert_message('با موفقیت اضافه شد', 'success');
        return redirect()->back();
    }
}
