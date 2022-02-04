<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PengumumanRequest extends FormRequest
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
            'judul' => ['required', 'string', 'max:100', 'min:10'],
            'deskripsi' => ['required', 'string', 'max:500', 'min:10'],
            'status' => ['required', Rule::in(['publish', 'draft'])],
        ];
    }
}
