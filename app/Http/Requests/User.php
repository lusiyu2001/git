<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
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
            'user_tel'=>"required|unique:dome",
            'user_pwd'=>"required",
        ];
    }
    public function messages()
    {
        return [
            "user_tel.required"=>'电话不能是空',
            "user_pwd.required"=>'用户密码不能为空',
            "user_tel.unique"=>'用户手机号已存在',
         
        ];
    }
}
