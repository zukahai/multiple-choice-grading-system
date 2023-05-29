<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:users|max:15|alpha_dash',
            'password' => 'required|min:6',
            'rePassword' => 'required_with:password|same:password|min:6',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản',
            'username.unique' => 'Tên tài khoản này đã tồn tại',
            'username.max' => 'Không được quá 15 ký tự',
            'username.alpha_dash' => 'Không chứa ký tự đặc biệt',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất phải 6 ký tự',
            'rePassword.required_with' => 'Vui lòng nhập lại mật khẩu',
            'rePassword.min' => 'Mật khẩu ít nhất phải 6 ký tự',
            'rePassword.same' => 'Mật khẩu nhập lại không đúng',
        ];
    }
}