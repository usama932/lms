<?php

namespace Modules\Order\Http\Controllers;

use App\Traits\ApiReturnFormatTrait;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Order\Interfaces\EnrollInterface;

class EnrollController extends Controller
{
    use ApiReturnFormatTrait;

    protected $enrollRepository;

    public function __construct(
        EnrollInterface $enrollRepository
    ) {
        $this->enrollRepository = $enrollRepository;
    }
    public function index(Request $request)
    {
        try {
            $data['title'] = ___('instructor.Course Enrollment'); // title
            $data['enrolls'] = $this->enrollRepository->model()->with('orderItem')->search($request)->orderBy('id', 'DESC')->paginate(10);
            return view('order::enroll.index', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function adminInvoice($enroll_id)
    {
        try {
            $data['enroll'] = $this->enrollRepository->model()->where('id', $enroll_id)->first() ;
            if (!$data['enroll']) {
                return redirect()->back()->with('danger', ___('alert.invoice_not_found'));
            }
            $data['title'] = ___('common.Invoice');
            $pdf = PDF::setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ])->loadView('panel.instructor.invoice.invoice', compact('data'));
            return $pdf->stream('invoice-'.$data['enroll']->id.time().'.pdf');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
}
