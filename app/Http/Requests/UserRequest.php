<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|between:3,25|unique:users,name,' . Auth::id(),
            'email' => 'nullable|email',
            'tel' => 'nullable|min:10',
            'password' => 'nullable|confirmed|min:6',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200,max_width=400,max_height=400',         
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '用户名已存在，请重新填写。',
            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
            'name.required' => '用户名不能为空。',
            'tel.min' => '手机号码格式不正确。',
            'password.min' => '请输入至少6位的密码。',
            'password.confirmed' => '两次密码输入不一致。',
            'avatar.mimes' => '上传的头像图片必须是 jpeg, bmp, png, gif 格式的图片。',
            'avatar.dimensions' => '上传的头像图片宽高必须大于200px，且小于400px。',
        ];
    }
}