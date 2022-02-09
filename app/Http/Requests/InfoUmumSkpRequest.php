<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoUmumSkpRequest extends FormRequest
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
            'id_pgw_kontrak' => ['required', 'exists:users,id'],
            'id_penilai' => ['required', 'exists:users,id'],
            'tgl_mulai_penilaian' => ['required', 'date'],
            'tgl_selesai_penilaian' => ['required', 'date', 'after:tgl_mulai_penilaian']
        ];
    }
}
