<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCareCreateRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'nick_name' => 'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name không được để trống.',
            'description.required' => 'Nội dung không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
            'nick_name.required' => 'Nick name không được để trống.',
            'image.required' => 'Ảnh không được để trống.',
            'image.image' => 'File phải là ảnh',
            'image.mimes' => 'Ảnh không đúng định dạng.',
            'image.max' => 'Ảnh không được quá 2048Mb.',
        ];
    }
}