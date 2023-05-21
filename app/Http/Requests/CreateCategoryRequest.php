<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;

class CreateCategoryRequest extends FormRequest
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
          'name' => 'required|unique:categories',
       ];

        return $rules;
    }

    public function messages()
    {
        if ( Config::get('app.locale') == 'pl') {
            $messages = [
                'name.required' => 'Nazwa jest wymagana',
                'name.unique' => 'Nazwa jest już zajęta'
            ];
        } else {
            $messages = [
                'name.required' => 'Name field is required',
                'name.unique' => 'Name field must by unique'
            ];
        }

        return $messages;
    }
}
