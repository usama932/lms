<?php

use Illuminate\Support\Facades\Route;

use Modules\Api\Http\Controllers\PaymentController;
use App\Http\Controllers\Api\V1\Guest\HomeController;
use Modules\Api\Http\Controllers\InstructorController;
use App\Http\Controllers\Api\V1\Guest\CourseController;
use App\Http\Controllers\Api\V1\Guest\CourseCategoryController;



Route::controller(CourseCategoryController::class)->prefix('v1/course')->group(function () {
    Route::get('/categories',                             'categories')->name('student.api.course.categories');
    Route::get('/categories/{id}/details',                'categoryDetails')->name('student.api.course.category_details');
});

// Home Api
Route::middleware(['auth:sanctum'])->controller(CourseController::class)->prefix('v1')->group(function () {
    Route::get('/courses',                                'index');
    Route::get('/course/{id}/details',                    'courseDetails')->name('home.api.course.details');
    Route::get('/see-all-courses',                        'seeAllCourses');
});

// instructor
Route::middleware(['auth:sanctum'])->controller(InstructorController::class)->prefix('v1')->group(function () {
    Route::get('/instructors',                            'index')->name('instructors.api.index');
    Route::get('/instructor/{id}/details',                'details')->name('instructors.api.details');
});





