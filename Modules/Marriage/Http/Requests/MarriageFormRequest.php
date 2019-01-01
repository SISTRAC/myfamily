<?php

namespace Modules\Marriage\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarriageFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      
        $rules = [
            'husband_first_name' => 'required|string|min:3|max:25|',
            'husband_last_name' => 'required|string|min:3|max:25|',
            'wife_first_name' => 'required|string|min:4|max:15',
            'wife_last_name' => 'required|string|min:5|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'town' => 'required|string|',
            'area' => 'required|string|',
            'house_no' => 'required|string|',
            'house_desc' => 'required|string|',
            'wife_status' => 'required|integer|',
            'marriage_date' => 'required',
        ];

        if($this->has('wfamily')){
            $rules['wife_email'] = 'required|email';
            $rules['wife_family'] = 'required|string';
        }else{
            $rules['wife_email'] = '';
            $rules['wife_date'] = 'required';
            $rules['wife_family'] = '';
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
