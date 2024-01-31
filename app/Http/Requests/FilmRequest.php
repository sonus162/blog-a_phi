<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            'name' => 'required|min:3',
            'id_film_category'  => 'required',
            'id_genre'  => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg|max:2048',
            'year' => 'bail|nullable|integer|min:1900|max:'.(date('Y')+1),
        ];
    }


    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập Tên',
            'name.min' => 'Tên tối thiểu 3 ký tự',
            'id_film_category.required'  => 'Vui lòng chọn danh mục',
            'id_genre.required'  => 'Vui lòng chọn thể loại',
            'thumbnail.image' => 'Ảnh không đúng định dạng',
            'year.integer' => 'Năm chưa chính xác',
            'year.min'  => 'Năm > 1900',
            'year.max'  => 'Năm <'.(date('Y')+1)
        ];
    }
}
