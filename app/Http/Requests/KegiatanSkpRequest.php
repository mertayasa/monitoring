<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class KegiatanSkpRequest extends FormRequest
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
            'kegiatan' => ['required', 'max:255'],
            'kuantitas' => ['required', 'numeric', 'gt:0', 'max:100000000'],
            'satuan_kuantitas' => ['required', 'string', 'max:50'],
            'waktu' => ['required', 'numeric', 'gt:0', 'max:100'],
            'satuan_waktu' => ['required', 'string', 'max:50'],
            'kualitas' => ['required', 'numeric', 'gt:0', 'max:100'],
            'biaya' => ['nullable', 'numeric', 'gt:0', 'max:100000000'],
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
