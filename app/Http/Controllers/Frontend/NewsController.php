<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsModel;

class NewsController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model =  new NewsModel();
    }

    public function index(){

        $data['list'] = $this->model->listItem(['columns' => ['id','name','slug','thumbnail','desc_short','user_created', 'created_at']], ['task' => 'frontend-getList']);

        return view('Frontend.module.news.list', compact('data'));
    }

    public function detail($slug){
        echo '<pre style="color:red;font-weight:bold">';
        print_r($slug);
        echo '</pre>';
        die();
        return 123;
    }
}
