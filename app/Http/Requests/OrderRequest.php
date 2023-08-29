<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' =>'required|string',
            'contacts' =>'required|string',
            'brand' =>'required|string',
            'model' =>'required|string',
            'year' =>'required|integer',
            'engine_type' =>'required',
            'engine_capacity' =>'required|integer',
            'transmission' =>'required',
            'drive' =>'required|string',
            'horse_power' =>'required|integer',
            'car_body' => 'required|string',
            'wheel' => 'required|string',
            'quality' =>'required|string',
        ];
    }
}
