<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadFilterRequest extends FormRequest
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
            'byName' => 'nullable|alpha|min:3|max:7',
            'repliesCount' => 'nullable|numeric',
            'threadChannelId' => 'nullable|in:1,2,3,4,5',            
            'pagination' => 'nullable|integer',
            'orderById' => 'nullable|string',
        ];        
    }



    public function messages()
    {
        return [
            'byName.string' => 'The :attribute must be a string.',
            'byName.min' => 'The :attribute must be at least :min characters.',
            'byName.max' => 'The :attribute may not be greater than :max characters.',
            'repliesCount.numeric' => 'The :attribute must be a number.',            
            'threadChannelId.in' => 'The :attribute must be 1-5',
            'pagination.integer' => 'The :attribute must be an integer.',
            'orderById.string' => 'The :attribute must be an integer.',
        ];
    }


}
