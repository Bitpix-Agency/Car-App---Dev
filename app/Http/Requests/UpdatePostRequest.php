<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'regno' => 'required|string',
            'post_desc' => 'required|string',
            'price' => 'required|numeric|between:0,9999999999.99999999999',
            'is_bid' => 'required|boolean',
            'make' => 'required|string',
            'model' => 'required|string',
            'mileage' => 'required|numeric|between:0,9999999999.99999999999',
            'doors' => 'required|integer',
            'type' => 'required|string',
            'seats' => 'required|integer',
            'transition' => 'required|string',
            'engine' => 'required|string',
            'year' => 'required|integer',
            'owners' => 'integer',
            'location' => 'required|string',
            'is_sold' => 'boolean',
            'is_featured' => 'required|boolean',
            'is_delete' => 'boolean',
            'sold_date' => 'date',
        ];
    }
}
