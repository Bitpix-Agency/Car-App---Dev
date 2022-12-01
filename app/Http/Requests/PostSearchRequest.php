<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSearchRequest extends FormRequest
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
            'modelId'=>'exists:models,id|integer',
            'makeId'=>'exists:makes,id|integer',
            'minPrice'=>'min:1|integer',
            'mileage'=>'integer',
            'year'=>'integer',
            'seats'=>'integer',
            'reg'=>'exists:posts,regno|string',
            'fuelId'=>'exists:fuel_types,id|integer',
            'sortBy'=>'required',
        ];
    }
}
