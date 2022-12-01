<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlertStoreRequest extends FormRequest
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
            'make_id' => 'exists:make,id',
            'model_id' => 'exists:models,id',
            'body_type' => 'string',
            'min_price' => 'min:1|integer',
            'mileage' => 'min:1|integer',
            'year' => 'min:4|integer',
            'reg_no' => 'string|max:7',
            'fuel_type_id' => 'integer|exists:fuel_types,id',
            'features' => 'string',
        ];
    }
}
