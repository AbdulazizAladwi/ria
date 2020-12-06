<?php

namespace App\Http\Requests\Dashboard\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $array = [
            'name'            => ['required','max:100','string','unique:contacts,name'],
            'email1'          => ['required','email','unique:contacts,email1'],
            'email2'          => ['nullable','email','unique:contacts,email2','different:email1'],
            'phone1'          => ['nullable','string','max:50'],
            'phone2'          => ['nullable','string','max:50','different:phone1'],
            'job_title'       => ['nullable','string','max:60'],
            'client_relation' => ['nullable','string','max:60'],
            'gender'          => ['nullable','in:male,female'],
            'facebook'        => ['nullable','url','max:255'],
            'twitter'         => ['nullable','url','max:255'],
            'snapchat'        => ['nullable','url','max:255'],
            'instagram'       => ['nullable','url','max:255'],
        ];

        if ( is_null($this->client) )
        {
            $array['client_id'] = ['required','integer'];
        }

        return $array;
    }
}
