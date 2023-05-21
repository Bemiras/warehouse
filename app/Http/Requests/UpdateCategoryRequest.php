<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class UpdateCategoryRequest extends FormRequest
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
       $rules = [
          'name' => 'required',
       ];

        return $rules;
    }

    public function messages()
    {
        if ( Config::get('app.locale') == 'pl') {
            $messages = [
                'name.required' => 'Nazwa jest wymagana'
            ];
        } else {
            $messages = [
                'name.required' => 'Name field is required'
            ];
        }

        return $messages;
    }
}
