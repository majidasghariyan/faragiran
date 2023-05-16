<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Requests\Course\AddLessonCourseRequest;
use App\Models\Course;
use App\Repositories\course\CourseRepositoryInterface;



class CourseController extends Controller
{
    private $repository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function index()
    {
        $title = "لیست دوره ها";
        $subtitle = "دوره ها";
        $courses = $this->repository->get_all();
        return view('admin.course.index', compact('courses', 'title', 'subtitle'));
    }

    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->repository->updateCourse($request, $course);
        alert_message('با موفقیت ویرایش شد', 'success');
        return redirect()->back();
    }

    public function add_lesson(Course $course)
    {
        return view('admin.course.add', compact('course'));
    }

    public function save_lesson(AddLessonCourseRequest $request, Course $course)
    {
        $this->repository->addLessonCourse($request, $course);
        alert_message('با موفقیت اضافه شد', 'success');
        return redirect()->back();
    }
}
