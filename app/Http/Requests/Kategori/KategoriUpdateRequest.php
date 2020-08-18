<?php

namespace App\Http\Requests\Kategori;

use Illuminate\Foundation\Http\FormRequest;

class KategoriUpdateRequest extends FormRequest
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
            'judul' => 'required|string|min:3|max:255|unique:kategori,judul,'.$this->request->get('id'),
            'deskripsi' => 'required|string|unique:kategori,deskripsi,'.$this->request->get('id')
        ];
    }
}
