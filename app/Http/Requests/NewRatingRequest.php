<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRatingRequest extends FormRequest
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
            'to_user' => 'required|integer|exists:users,id',
            'from_user' => 'required|integer|exists:users,id',
            'rating' => 'required|integer|digits_between:1,5',
        ];
    }
}
