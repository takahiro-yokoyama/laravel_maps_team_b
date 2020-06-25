<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSpotRequest extends FormRequest
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
            'address' => ['required', 'max:100'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
            'anime_name' => ['required', 'max:50'],
            'spot_name' => ['required', 'max:50'],
            'spot_content' => ['required', 'max:200'],
        ];
    }
}
