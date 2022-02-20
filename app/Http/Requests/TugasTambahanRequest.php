<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TugasTambahanRequest extends FormRequest
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
            'nama_tugas' => ['required', 'string', 'max:100', 'min:5'],
            'nilai' => ['nullable', 'numeric', 'min:0', 'max:100'],
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

    protected function failedValidation(Validator $validator) {

        throw new HttpResponseException(
            response()->json([

                'errors' => $validator->errors()

            ],400)
        );
    }
}
