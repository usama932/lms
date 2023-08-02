<?php

namespace Modules\Api\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Interfaces\OrderInterface;
use Modules\Order\Interfaces\EnrollInterface;
use Modules\Course\Interfaces\CourseInterface;
use Modules\Api\Transformers\AssignmentResource;
use Modules\Student\Interfaces\StudentInterface;
use Modules\Api\Collections\AssignmentCollection;
use Modules\Course\Interfaces\AssignmentInterface;
use Modules\Course\Interfaces\AssignmentSubmitInterface;
use Modules\Course\Http\Requests\AssignmentSubmitRequest;

class AssignmentController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;

    protected $user;
    protected $assignment;
    protected $studentInterface;
    protected $enrollInterface;
    protected $orderInterface;
    protected $assignmentSubmitInterface;
    protected $template = 'panel.student';

    public function __construct(User $user, AssignmentInterface $assignmentInterface, StudentInterface $studentInterface, OrderInterface $orderInterface, EnrollInterface $enrollInterface, AssignmentSubmitInterface $assignmentSubmitInterface)
    {
        $this->user                        = $user;
        $this->assignment                  = $assignmentInterface;
        $this->studentInterface            = $studentInterface;
        $this->enrollInterface             = $enrollInterface;
        $this->orderInterface              = $orderInterface;
        $this->assignmentSubmitInterface = $assignmentSubmitInterface;
    }


    public function index(){
        try {
            $enroll  = $this->enrollInterface->model()->with(['course:id,title'])->where('user_id', Auth::id())->get();
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

                return $this->responseWithSuccess(___('common.data found'), $data);
            } else {
                return $this->responseWithSuccess(___('common.no data found'), $data);
            }

        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    public function assignmentDetails(Request $request, $assignment_id)
    {
        try {
            $assignment = @$this->assignment->model()->where('id', $assignment_id)->first();

            if ($assignment) {
                $data['assignment'] = new AssignmentResource($assignment);

                return $this->responseWithSuccess(___('common.data found'), $data);
            } else {
                $data['assignments'] = [];

                return $this->responseWithSuccess(___('common.no data found'), $data);
            }

        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    public function assignmentDownload($enroll, $assignment_id)
    {
        try {
            $enroll_id = decryptFunction($enroll);
            $assignment_id = decryptFunction($assignment_id);
            $enroll = $this->enrollRepository->model()->where('user_id', Auth::id())->where('id', $enroll_id)->first();
            $assignment = @$enroll->course->assignments->where('id', $assignment_id)->first();
            if ($enroll && @$assignment) {
                $file = @$assignment->assignmentFile->original;
                if ($file) {
                    return downloadFile($file); // download file
                } else {
                    return redirect()->back()->with('danger', ___('alert.File not found')); // return error response
                }
            } else {
                return redirect()->back()->with('danger', ___('alert.Enroll not found')); // return error response
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again')); // return error response
        }
    }

    public function assignmentStore(AssignmentSubmitRequest $request, $enroll_id, $assignment_id)
    {

        try {
            $result = $this->assignmentSubmitRepository->store($request, $enroll_id, $assignment_id);
            if ($result->original['result']) {
                return $this->responseWithSuccess($result->original['message'], [], 200); // return error response
            } else {
                return $this->responseWithError($result->original['message'], [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }
}

