<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Modules\Course\Interfaces\CourseInterface;

class CourseDetailsController extends Controller
{
    use ApiReturnFormatTrait;

    // constructor injection
    protected $course;

    public function __construct(CourseInterface $courseInterface)
    {
        $this->course = $courseInterface;
    }

    public function index($slug)
    {
        try {
            $data['title'] = ___('frontend.Course Details'); // title
            $data['course'] = $this->course->model()->slug($slug)->first();
            $data['profile'] = view('frontend.partials.course.instructor_profile', compact('data'))->render();
            $data['review'] = view('frontend.partials.course.reviews', compact('data'))->render();
            $data['curriculum'] = view('frontend.partials.course.curriculum', ['sections' => $data['course']->sections])->render();
            if ($data['course']) {
                return view('frontend.course.course_details', compact('data'));
            } else {
                return redirect('/')->with('danger', ___('alert.Course_not_found'));
            }
        } catch (\Throwable $th) {
            return redirect('/')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }

    }
}
