<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
        $task = $this->task;
        $id = $this->id;
        $condFullNamme = '';
        $condEmail     = '';
        $condAvatar    = '';
        $condPassword  = '';

        switch($task){
            case 'add':
                $condFullNamme = 'bail|required';
                $condEmail = 'bail|required|unique:member|email';
                $condAvatar = 'image|max:2048|mimes:jpg,png,jpeg';
                $condPassword = 'required|min:6|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x]).*$/|confirmed';
                break;
            case 'edit-info':
                $condFullNamme = 'bail|required';
                $condEmail = 'bail|required|email';
                $condAvatar = 'image|max:2048|mimes:jpg,png,jpeg';
                break;
            case 'change-password':
                $condPassword = 'required|min:6|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x]).*$/|confirmed';
                break;
            default:
                break;
        }

        return [
            'fullname' => $condFullNamme,
            'email' => $condEmail,
            'avatar' => $condAvatar,
            'password' => $condPassword
        ];
    }

    public function messages(){
        return [
            'fullname.required' => 'Vui lòng nhập Họ tên !',
            'email.unique'  => 'Email đã được sử dụng !',
            'email.required' => 'Vui lòng nhập Email !',
            'email.email' => 'Email chưa đúng !',
            'status.required' => 'Vui lòng chọn trạng thái',
            'avatar.mimes' => 'Avatar chưa hợp lệ!',
            'avatar.image' => 'Avatar không đúng!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu có ít nhất 6 ký tự!',
            'password.confirmed' => 'Mật khẩu xác nhận chưa đúng !',
            'password.regex' => 'Mật khẩu có ít nhất một chữ viết hoa, ít nhất một số, ký tự đặc biệt'
        ];
    }
}
