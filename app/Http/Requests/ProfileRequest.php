<?php

namespace App\Http\Requests;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
         $rules = [
            'nama' => 'required|max:50',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ];

         if($this->getMethod() == 'PATCH'){
            $user_id = $this->route('user')->id;

            $rules += [
                'email' => 'required|max:50|unique:users,email,'.$user_id,
            ];

            if($this->password != null){
                $rules += ['password' => 'required|min:8|confirmed'];
            }
        }
         return $rules;
    }
}
