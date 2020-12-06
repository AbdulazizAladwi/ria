<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'                => 'required',
            'description'         => 'required',
            'phone'               => 'required',
            'email'               => 'required',
            'days'                => 'required',
            'dashboard_logo'      => 'nullable|image',
            'admin_image'         => 'nullable|image'
        ];
    }
}
