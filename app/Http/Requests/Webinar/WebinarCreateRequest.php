<?php

namespace App\Http\Requests\Webinar;

use Illuminate\Foundation\Http\FormRequest;

class WebinarCreateRequest extends FormRequest
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
            'nama' => 'required',
            'url' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|mimes:jpeg,png,bmp,tiff|max:5120',
            'mulai' => 'required',
            'akhir' => 'required'
        ];
    }
}
