<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Order\Entities\Order;
use Modules\Order\Interfaces\EnrollInterface;
use Modules\Order\Interfaces\OrderInterface;
use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Interfaces\PaymentInterface;

class PaymentController extends Controller
{

    private $orderRepository;
    private $paymentRepository;
    private $enrollRepository;

    public function __construct(OrderInterface $orderRepository, PaymentInterface $paymentRepository, EnrollInterface $enrollRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->paymentRepository = $paymentRepository;
        $this->enrollRepository = $enrollRepository;
    }
    public function verify(Request $request, $gateway)
    {
        $payment_method = PaymentMethod::where('name', $gateway)->first();

        try {

            if (@$request->get('status') == 'cancel') {
                return redirect()->route('checkout.index')->with('danger', ___('alert.Cancelled_payment'));
            } elseif (@$request->get('status') == 'fail') {
                return redirect()->route('checkout.index')->with('danger', ___('alert.Failed_payment'));
            }
            $payment = $this->paymentRepository->findPaymentMethod($payment_method->name);
            $order = $payment->verify($request);
            if (@$order) {
                if ($order->status == 'processing') {
                    $result = $this->enrollRepository->store($order);
                    if ($result->original['result']) {
                        $order->update([
                            'status' => 'paid',
                            'paid_amount' => $order->total_amount,
                            'due_amount' => 0,
                        ]);
                    } else {
                        return redirect()->route('checkout.index')->with('danger', ___('alert.Payment gateway error'));
                    }
                }
                session()->put('order_id', $order->id);
                return redirect()->route('payment.status');
            } else {
                return redirect()->route('checkout.index')->with('danger', ___('alert.Payment gateway error'));
            }
        } catch (\Exception $exception) {
            return redirect()->route('checkout.index')->with('danger', ___('alert.Payment gateway error'));
        }
    }

    public function status(Request $request)
    {
        try {
            $orderId = $request->get('order_id', null);
            if (!empty(session()->get('order_id', null))) {
                $orderId = session()->get('order_id', null);
                session()->forget('order_id');
                session()->forget('cart');
                session()->forget('total_price');
                session()->forget('discount');
            }
            $order = Order::where('id', $orderId)
                ->where('user_id', auth()->id())
                ->first();

            if (!empty($order)) {
                return redirect('/student/courses')->with('success', ___('alert.Payment successfully completed'));
            }
            return redirect('/student/courses')->with('success', ___('alert.Payment successfully completed'));
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
}
