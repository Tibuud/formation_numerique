<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|unique:posts,title|max:255',
            'description' => 'required',
            'post_type' => 'required|in:formation,stage',
            'price' => "required|regex:/^\d*(\.\d{2})?$/",
            'student_max' => 'required|integer|max:50',
            'category_id' => 'integer',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'status' => 'required|in:published,unpublished',
            'picture' => 'image|mimes:jpg,png'
        ];
    }
}
