<?php

namespace App\Http\Requests\Dashboard\Contact;

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
            'name'            => ['required','max:100','unique:contacts,name,'.$this->contact],
            'email1'          => ['required','email','unique:contacts,email1,'.$this->contact],
            'email2'          => ['nullable','email','unique:contacts,email2,'.$this->contact,'different:email1'],
            'phone1'          => ['nullable','string','max:50'],
            'phone2'          => ['nullable','string','max:50','different:phone1'],
            'job_title'       => ['nullable','string','max:60'],
            'client_relation' => ['nullable','string','max:60'],
            'gender'          => ['nullable','in:male,female'],
            'facebook'        => ['nullable','url','max:255'],
            'twitter'         => ['nullable','url','max:255'],
            'snapchat'        => ['nullable','url','max:255'],
            'instagram'       => ['nullable','url','max:255'],
            'client_id'       => ['required','integer'],

        ];
    }
}
