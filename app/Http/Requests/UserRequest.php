<?php

namespace App\Http\Requests;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $route_level = $this->route('level');
        $today = Carbon::now()->format('Y-m-d');

        $rules = [
            'nama' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ];

        if($this->status){
            $rules += ['status' => ['required', Rule::in(['aktif', 'nonaktif'])]];
        }

        if($route_level == User::$penilai){
            $rules += ['id_pangkat_golongan' => ['required', 'numeric', 'exists:pangkat_golongan,id']];
            $rules += ['id_jabatan' => ['required', 'numeric', 'exists:jabatan,id']];
            $rules += ['id_unit_kerja' => ['required', 'numeric', 'exists:junit_kerja,id']];
        }
        
        if($route_level == User::$kontrak){
            $rules += ['tgl_mulai_kontrak' => ['nullable', 'date']];
            $rules += ['tgl_selesai_kontrak' => ['nullable', 'date']];
            $rules += ['id_unit_kerja' => ['required', 'numeric', 'exists:junit_kerja,id']];
        }

        if($route_level != User::$admin){
            $rules += ['jenis_kelamin' => ['required', Rule::in('Laki-laki', 'Perempuan')]];
            $rules += ['no_tlp' => ['required', 'string', 'max:13']];
            $rules += ['tempat_lahir' => ['required', 'max:50']];
            $rules += ['tgl_lahir' => ['required', 'date', 'before:'.$today]];
            $rules += ['alamat' => ['required', 'max:100']];
        }

        if($this->method() == 'PATCH'){
            $rules['email'] = ['required', 'unique:users,email,'.$this->route('user')->id];
            
            if($route_level == User::$penilai){
                $rules += ['nip' => ['required', 'numeric', 'unique:users,nip,'.$this->route('user')->id]];
            }
            
            if($route_level == User::$kontrak){
                $rules += ['no_kontrak' => ['required', 'numeric', 'unique:users,no_kontrak,'.$this->route('user')->id]];
            }
            
            if($this->password != null){
                $rules['password'] = ['required', 'min:6', 'confirmed'];
            }else{
                unset($rules['password']);
            };

        }else{
            if($route_level == User::$penilai){
                $rules += ['nip' => ['required', 'numeric', 'unique:users,nip']];
            }

            if($route_level == User::$kontrak){
                $rules += ['no_kontrak' => ['required', 'numeric', 'unique:users,no_kontrak']];
            }
            unset($rules['password']);
        }

        dd($rules);
        return $rules;
    }

    public function messages()
    {
        return [
            'tgl_lahir.before' => 'Tanggal lahir tidak boleh lebih dari hari ini',
        ];
    }
}

// 0 => "nama"
// 1 => "email"
// 9 => "nip",
// 6 => "no_tlp"
// 2 => "id_pangkat_golongan"
// 3 => "id_jabatan"
// 4 => "id_unit_kerja"
// 5 => "jenis_kelamin"
// 7 => "tempat_lahir"
// 8 => "tgl_lahir"
// 10 => "alamat"