<?php

namespace Modules\Family\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'family' => 'required|string|min:3|max:25|',
            'title' => 'required|string|min:3|max:25|unique:families',
            'tribe' => 'required|string|min:4|max:15',
            'location' => 'required|string|min:5|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'lga' => 'required|string|'
        ];
        if($this->has('mdate')){
            $rules['email'] = '';
            $rules['name'] = '';
            $rules['sname'] = '';
            $rules['date_of_birth'] = '';
            $rules['password'] = '';
        }else{
            $rules['email'] = 'required|email|unique:users';
            $rules['name'] = 'required|string|min:2|max:255';
            $rules['sname'] = 'required|string|min:2|max:255';
            $rules['date_of_birth'] = 'string|min:3|max:255';
            $rules['password'] = 'required|file|mimes:pdf';
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
