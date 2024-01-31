<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $name = 'Trang chủ';
    public function index(){
        return view('Backend.module.dashboard', [
            'breadcumb' => ['lv1' => 'Phim', 'lv2' => $this->name]
        ]);
    }
}
