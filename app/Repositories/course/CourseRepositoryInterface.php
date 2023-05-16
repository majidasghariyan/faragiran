<?php

namespace App\Repositories\course;

interface CourseRepositoryInterface
{
    public function get_all();
    public function updateCourse($request, $course);
    public function addLessonCourse($request, $course);

}
