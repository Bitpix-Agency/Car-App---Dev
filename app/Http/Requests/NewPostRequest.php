<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPostRequest extends FormRequest
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
            'regNo' => 'required',
            'makeId' => 'required|integer',
            'modelId' => 'required|integer',
            'mileage' => 'required|integer',
            'price' => 'required',
            'fuelId' => 'required|integer',
            'doors' => 'required|integer',
            'type' => 'required',
            'seats' => 'required|integer',
            'year' => 'required|integer',
            'engine' => 'required',
            'owners' => 'required|integer',
            'transmission' => 'required',
            'postDesc' => 'required',
            'keys' => 'required',
            'serviceHistory' => 'required',
            'dealerHistory' => 'required',
            'vehicleStatus' => 'required',
            'v5Status' => 'required',
            'tread1' => 'required|integer',
            'tread2' => 'required|integer',
            'tread3' => 'required|integer',
            'tread4' => 'required|integer',
            'motExpire' => 'required|date',
            'prep' => 'required|integer',
        ];
    }
}
