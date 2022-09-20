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
            "address" => "required|min:6|max:255",
            "typology_id"=>"required",
            "longitude" => "required|min:5|max:15",
            "latitude" => "required|min:5|max:15",
            "title" => "required",
            "description" => "required|min:80|max:255",
            "rooms" => "required|min:1|max:10",
            "beds" => "required|min:1|max:10",
            "bathrooms" => "required|min:1|max:6",
            "mt_square" => "required",
            "image" => "required",
            "available" => "required",
            "services" => "required",
        ];
    }
}
