<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

/*
    Tính năng nhớ mật khẩu không thể sử dụng hàm bcrypt => do bcrypt không thể giải mã ngược lại về mật khẩu ban đầu
**/

class AuthController extends Controller
{
    public $controllerName = 'auth';
    private $model;
    private $params = [];

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function login(Request $request){
        return view('Backend.auth.login');
    }

    public function postLogin(Request $request){

        $credentials = $request->only('username', 'password');
        $user = UserModel::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {

            // if (isset($request->all()['remember'])) {
            //     $rememberToken = Str::random(60); // Tạo một token ngẫu nhiên
            //     UserModel::where('username', $credentials['username'])->update(['remember_token' => $rememberToken]);  // Lưu token vào trường remember_token trong bảng người dùng
            //     Cookie::queue('remember_token', $rememberToken, 60*24*1); // Lưu token vào cookie trong 30 ngày
            // }

            Session::put('user', $user);
            return redirect()->intended('admin');

        } else {
            // Đăng nhập thất bại
            return redirect()->route('auth/login')->with('error', 'Tài khoản hoặc Mật khẩu không đúng');
        }
    }

    public function logout(){
        Session::forget('user');
        return redirect()->route('auth/login');
    }

    // public function checkRememberMe(Request $request)
    // {
    //     if ($request->cookie('remember_token')) {
    //         $user = UserModel::where('remember_token', $request->cookie('remember_token'))->first()->toArray();
    //         if ($user) {
    //             // Người dùng được xác định bằng token, đăng nhập họ vào hệ thống
    //             return $user;
    //         }
    //     }
    //     // Tiếp tục xử lý trang
    // }

}
