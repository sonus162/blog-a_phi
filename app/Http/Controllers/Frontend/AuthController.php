<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $controllerName = 'auth';
    private $model;
    private $params = [];

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function login(){
        return view('Frontend.pages.auth.login');
    }

}
