<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\ApiReturnFormatTrait;
use Modules\Course\Interfaces\LessonInterface;
use Modules\Course\Interfaces\QuestionInterface;
use Modules\Course\Interfaces\QuizResultInterface;

class QuestionController extends Controller
{
    use ApiReturnFormatTrait;

    // constructor injection
    protected $question;
    protected $lesson;
    protected $quizResult;

    public function __construct(QuestionInterface $questionInterface, LessonInterface $lessonInterface, QuizResultInterface $quizResultInterface)
    {
        $this->question = $questionInterface;
        $this->lesson = $lessonInterface;
        $this->quizResult = $quizResultInterface;
    }

    public function index(Request $request)
    {
        try {
            $quizzes = $this->lesson->model()
                ->search($request)
                ->where('is_quiz', 1); // get quizzes
            $data['total_submissions'] = $quizzes->clone()->withCount('submissions')->get()->sum('submissions_count');

            $data['passed_submissions'] = $quizzes->clone()->withCount(['submissions' => function ($query) {
                $query->where('status_id', 25);
            }])->get()->sum('submissions_count');

            $data['failed_submissions'] = $quizzes->clone()->withCount(['submissions' => function ($query) {
                $query->where('status_id', 24);
            }])->get()->sum('submissions_count');

            $data['quizzes'] = $quizzes->clone()->paginate(10); // data
            $data['title'] = ___('course.Course Quizzes List'); // title
            return view('course::quiz.quiz_list', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function submission($quiz_id)
    {
        try {
            $data['quizzes'] = $this->lesson->model()->with('submissions')->where('id', $quiz_id)->first(); // data
            if (!$data['quizzes']) {
                return redirect()->back()->with('danger', ___('alert.Quiz not found'));
            }
            $data['submissions'] = $data['quizzes']->submissions()->latest()->paginate(10);
            $data['title'] = ___('course.Quiz Submissions'); // title
            return view('course::quiz.submission_list', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function view($submission_id)
    {
        try {
            $data['result'] = $this->quizResult->model()->where('id', $submission_id)->first(); // data
            if (!$data['result']) {
                return $this->responseWithError('danger', ___('alert.Quiz not found'));
            }
            $data['title'] = ___('course.Quiz Submission Details'); // title
            $html = view('course::quiz.modal.view', compact('data'))->render(); // render view
            return $this->responseWithSuccess(___('alert.data_retrieve_success'), $html); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }
}
