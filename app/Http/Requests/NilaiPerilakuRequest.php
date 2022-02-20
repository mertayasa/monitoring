<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NilaiPerilakuRequest extends FormRequest
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
            'id_nilai_skp' => ['required', 'exists:nilai_skp,id'],
            'orientasi_pelayanan' => ['required', 'numeric', 'gt:0', 'max:100'],
            'integritas' => ['required', 'numeric', 'gt:0', 'max:100'],
            'komitmen' => ['required', 'numeric', 'gt:0', 'max:100'],
            'disiplin' => ['required', 'numeric', 'gt:0', 'max:100'],
            'kerjasama' => ['required', 'numeric', 'gt:0', 'max:100'],
            'kepemimpinan' => ['required', 'numeric', 'gt:0', 'max:100'],
        ];
    }

    public function messages()
    {
        $messages = [
            'id_nilai_skp.required' => 'Form nilai skp tidak sesuai',
            'id_nilai_skp.exists' => 'Form nilai skp tidak sesuai',
        ];

        return $messages;
    }
}
