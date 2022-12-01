<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewDeviceRequest extends FormRequest
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
            'device_type' => 'required|string',
            'device_model' => 'required|string',
            'one_signal_id' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
