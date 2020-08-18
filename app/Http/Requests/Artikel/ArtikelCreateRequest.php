<?php

namespace App\Http\Requests\Artikel;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelCreateRequest extends FormRequest
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
            'nama' => 'required|min:5|max:255|unique:artikel',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'gambar' => 'mimes:jpeg,png,bmp,tiff|max:5120'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         'mimes' => 'Itu bukan gambar bro.'
    //     ];
    // }

}
