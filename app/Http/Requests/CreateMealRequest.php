<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMealRequest extends FormRequest
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
            'description_ar'       => 'string',
            'description_he'       => 'string',
            'image'                => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'                => 'required|int|min:1|max:100',
            'section_id'           => 'required|int|exists:sections,id',
            'extra'                => 'required',
            'slug'                 => 'required',
        ];
    }
}
