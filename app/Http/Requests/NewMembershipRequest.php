<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewMembershipRequest extends FormRequest
{
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'apple_product_id' => 'string',
            'stripe_product_id' => 'string',
            'subscription_title' => 'required|string',
            'subscription_description' => 'required|string',
            'subscription_amount' => 'required|numeric|between:0,9999999999.99999999999',
            'members_price' => 'required|numeric|between:0,9999999999.99999999999',
            'agency_limit' => 'integer',
            'stripe_members_price_id' => 'string',
            'membership_type' => 'required|integer|exists:membership_types,id',
            'status' => 'required|boolean',
            'trial_length' => 'integer',
        ];
    }
}
