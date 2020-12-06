<?php

namespace App\Http\Requests\Dashboard\Clients;

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
            'name'                      => 'required|min:4',
            'type_id'                   => 'required',
            'phone1'                    => 'required',
            'phone2'                    => 'nullable',
            'email1'                    => 'required|unique:clients,email1,'. $this->client,
            'email2'                    => 'nullable|different:email1'. $this->client,
            'area'                      => 'required',
            'block'                     => 'required|numeric',
            'street'                    => 'required',
            'zip_code'                  => 'required|numeric',
            'company_name.*'            => 'required',
            'company_phone1.*'          => 'nullable',
            'company_email1.*'          => 'nullable',
            'company_email2'            => 'nullable',
        ];
    }
}
