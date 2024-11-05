<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Auth::check(); 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rate' => 'required|max:5|integer',
            'comment' => 'required',
            'product_id'=> 'required|integer'
        ]; 
    }

    public function messages()
    {
        return [
            'rate.required' => 'Rate is required!',
            'rate.max' => 'Maximum rate is 5 !',
            'comment.required' => 'Comment is required!'
        ];
    }
}
