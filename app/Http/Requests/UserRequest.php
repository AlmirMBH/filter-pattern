<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Summary of UserRequest
 */
class UserRequest extends FormRequest
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


    // public function prepareForValidation()
    // {
    //     $this->merge([
    //         'email' => $this->input('user_email'),
    //     ]);
    //     $this->request->remove('user_email');        
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|alpha|min:3|max:7',
            'email' => 'nullable|email',
            'roleId' => 'nullable|in:1,2,3,4,5',            
            'pagination' => 'nullable|integer',
            'orderById' => 'nullable|string',
        ];        
    }



    public function messages()
    {
        return [
            'name.string' => 'The :attribute must be a string.',
            'name.min' => 'The :attribute must be at least :min characters.',
            'name.max' => 'The :attribute may not be greater than :max characters.',
            'email.email' => 'The :attribute must be a valid email address.',
            'roleId.in' => 'The :attribute must be 1-5',           
            'pagination.integer' => 'The :attribute must be an integer.',
            'orderById.string' => 'The :attribute must be an integer.',
        ];
    }


    // public function attributes(): array
    // {
    //     return [
    //         'email' => 'email address',
    //     ];
    // }


}
