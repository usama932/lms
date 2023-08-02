<?php

namespace Modules\Instructor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorPaymentMethodRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'payment_method' => 'required|max:20|exists:payment_methods,id',
            'type' => 'required|max:20',
            'status_id' => 'required|max:20',
            'password' => 'required|min:6|max:20',
        ];
        if ($this->request->get('payment_method') == 1) {
            array_push($rules, [
                'stripe_key' => 'required|max:255',
                'stripe_secret' => 'required|max:255',
            ]);

        } elseif ($this->request->get('payment_method') == 2) {
            array_push($rules, [
                'store_id' => 'required|max:255',
                'store_password' => 'required|max:255',
            ]);
        }
        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'payment_method.required' => 'Payment Method is required',
            'type.required' => 'Type is required',
            'status_id.required' => 'Status is required',
            'stripe_key.required' => 'Stripe Key is required',
            'stripe_secret.required' => 'Stripe Secret is required',
            'store_id.required' => 'Store ID is required',
            'store_password.required' => 'Store Password is required',
        ];
    }
}
