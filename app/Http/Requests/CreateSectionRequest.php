<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionRequest extends FormRequest
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
            'name_ar'              => 'required|string|min:3|max:50',
            'name_he'              => 'required|string|min:3|max:50',
            'image'                => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug'                 => 'required',
        ];
    }
}
