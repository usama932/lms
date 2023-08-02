<?php

namespace Modules\Api\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use Illuminate\Routing\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Modules\Order\Interfaces\OrderInterface;
use Modules\Order\Interfaces\EnrollInterface;
use Modules\Student\Interfaces\StudentInterface;
use Modules\Api\Collections\AssignmentCollection;

class AppController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;

    protected $user;
    protected $studentInterface;
    protected $enrollInterface;
    protected $orderInterface;


    public function __construct(User $user,StudentInterface $studentInterface,EnrollInterface $enrollInterface, OrderInterface $orderInterface)
    {
        $this->user                         = $user;
        $this->studentInterface            = $studentInterface;
        $this->enrollInterface             = $enrollInterface;
        $this->orderInterface              = $orderInterface;
    }


    public function dashboard(){
        try {
            $data['purchase_amounts']           = $this->orderInterface->model()->where('user_id',auth()->id())->sum('total_amount');
            $data['course_count']               = $this->enrollInterface->model()->where('user_id',auth()->id())->count();
            $enroll                             = $this->enrollInterface->model()->with(['course:id,title'])->where('user_id', Auth::id())->get();

            if ($enroll) {
                $assignments = [];
                foreach ($enroll as $enrolled_course) {
                    $assignmentCollection = new AssignmentCollection($enrolled_course->course->activeAssignments);
                    $assignmentArray = json_encode($assignmentCollection);
                    if ($assignmentCollection->isNotEmpty()) {
                        $assignments = array_merge($assignments, json_decode($assignmentArray));
                    }
                }

                $data['assignments'] = $assignments;
            } else {
                $data['assignments'] = [];
            }

           return $this->responseWithSuccess(___('student.data found'), $data);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }

    }
}
