<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class EditCateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name'=>'unique:categories,name,'.$request->id.',id',
            'cate_slug'=>'unique:categories,cate_slug'.$request->id.',id',
        ];
    }
    public function messages(){
         return [
            'name.unique'=>'Tên danh mục đã bị trùng!',
             'cate_slug.unique'=>'Tên danh mục đã bị trùng!'
        ];
    }
}
