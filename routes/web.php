<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    $course = \App\Models\Course::find(4);
    $course->prices()->create([
       'price' => 500,
    ]);
});

Route::group(['prefix'=>'/panel'], function() {

    // CourseController
    Route::prefix('/courses/')->group(function (){
        Route::get('',[App\Http\Controllers\CourseController::class, 'index'])->name('admin.course.index');
        Route::get('{course}/edit',[App\Http\Controllers\CourseController::class, 'edit'])->name('admin.course.edit');
        Route::get('add/{course}/lesson',[App\Http\Controllers\CourseController::class, 'add_lesson'])->name('admin.course.add');
        Route::post('{course}/edit',[App\Http\Controllers\CourseController::class, 'update'])->name('admin.course.update');
        Route::post('{course}/lessons',[App\Http\Controllers\CourseController::class, 'save_lesson'])->name('admin.course.save.lesson');
    });

});

