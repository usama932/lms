<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Redirect;
use Modules\Order\Interfaces\EnrollInterface;
use Modules\Order\Interfaces\OrderInterface;
use Modules\Payment\Interfaces\PaymentInterface;

class CheckoutController extends Controller
{
    use ApiReturnFormatTrait;

    private $orderRepository;
    private $paymentRepository;
    private $enrollRepository;

    public function __construct(OrderInterface $orderRepository, PaymentInterface $paymentRepository, EnrollInterface $enrollRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->paymentRepository = $paymentRepository;
        $this->enrollRepository = $enrollRepository;
    }

    public function index()
    {
        try {
            $data['carts'] = Session()->get('cart');
            if (!$data['carts']) {
                return redirect()->route('home')->with('danger', ___('alert.Cart_is_empty'));
            }
            $data['total_price'] = 0;
            $data['discount'] = 0;
            foreach ($data['carts'] as $key => $cart) {
                $data['total_price'] += $cart['price'];
                $data['discount'] += $cart['discount_price'];
            }
            $data['payment_method'] = $this->paymentRepository->model()->active()->get();
            session()->put('total_price', $data['total_price']);
            session()->put('discount', $data['discount']);
            $data['title'] = ___('frontend.Checkout'); // title
            return view('frontend.checkout', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    // payment

    public function payment(CheckoutRequest $request)
    {
        try {
            $payment_method = $request->payment_method ? decrypt($request->payment_method) : null;

            if (!$payment_method) {
                return redirect()->back()->with('danger', ___('alert.Please_select_payment_method'));
            }

            $data['carts'] = Session()->get('cart');

            if (!$data['carts']) {
                return redirect()->route('home')->with('danger', ___('alert.Cart_is_empty'));
            }
            $data['payment_method'] = $payment_method;
            $data['country'] = setting('country') ? setting('country') : 'Bangladesh';
            // order data
            $result = $this->orderRepository->store($data);
            session()->put('order_id', $result->original['data']->id);
            if ($result->original['result']) {
                try {
                    if ($result->original['data']->total_amount == 0) {
                        $resultRepo = $this->enrollRepository->store($result->original['data']);
                        if ($resultRepo->original['result']) {
                            $result->original['data']->update([
                                'status' => 'paid',
                                'paid_amount' => 0,
                                'due_amount' => 0,
                            ]);
                            return redirect()->route('payment.status');
                        } else {
                            return redirect()->route('checkout.index')->with('danger', ___('alert.Payment gateway error'));
                        }
                    }
                    $payment = $this->paymentRepository->findPaymentMethod($payment_method);
                    $redirect = $payment->process($result->original['data']);
                    if (in_array($payment_method, $this->paymentRepository->withoutRedirect())) {
                        return $redirect;
                    }
                    return Redirect::away($redirect);
                } catch (\Throwable $th) {
                    return redirect()->route('checkout.index')->with('danger', ___('alert.Payment gateway error'));
                }

            } else {
                return redirect()->back()->with('danger', $result['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('checkout.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
}
