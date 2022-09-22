<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccommodationRequest extends FormRequest
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
            "address" => "required|string|min:6|max:100",
            "typology_id"=>"required",
            "longitude" => "required|integer|digits_between:3,8",
            "latitude" => "required|integer|digits_between:3,8",
            "title" => "required|string|min:10|max:50",
            "description" => "required|string|min:40|max:1000",
            "rooms" => "required|integer|min:1|max:50",
            "beds" => "required|integer|min:1|max:50",
            "bathrooms" => "required|integer|min:1|max:50",
            "mt_square" => "required|integer|min:1|max:5000",
            "image" => "nullable|image",
        
            "services" => "required",
        ];
    }
}
