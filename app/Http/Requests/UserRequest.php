<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $task = $this->task;
        $id = $this->id;
        $condUsername  = '';
        $condFullNamme = '';
        $condEmail     = '';
        $condRole      = '';
        $condAvatar    = '';
        $condPassword  = '';

        switch($task){
            case 'add':
                $condUsername = 'bail|required|unique:user|min:3';
                $condFullNamme = 'bail|required';
                $condEmail = 'bail|required|email';
                $condRole = 'bail|required';
                $condAvatar = 'image|max:2048|mimes:jpg,png,jpeg';
                $condPassword = 'required|min:6|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x]).*$/|confirmed';
                break;
            case 'edit-info':
                $condUsername = 'bail|required|unique:user,username,'.$id.'|min:3';
                $condFullNamme = 'bail|required';
                $condEmail = 'bail|required|email';
                $condAvatar = 'image|max:2048|mimes:jpg,png,jpeg';
                break;
            case 'change-password':
                $condPassword = 'required|min:6|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x]).*$/|confirmed';
                break;
            case 'change-role':
                $condRole = 'bail|required';
                break;
            default:
                break;
        }

        return [
            'username' => $condUsername,
            'fullname' => $condFullNamme,
            'email' => $condEmail,
            'role_user_id' => $condRole,
            'avatar' => $condAvatar,
            'password' => $condPassword
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Vui lòng nhập tên User !',
            'username.min' => 'Tên tối thiểu 3 ký tự !',
            'username.unique' => 'Tài khoản đã tồn tại',
            'fullname.required' => 'Vui lòng nhập Họ tên !',
            'email.required' => 'Vui lòng nhập Email !',
            'email.email' => 'Email chưa đúng !',
            'role_user_id.required' => 'Vui lòng chọn Quyền truy cập !',
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
