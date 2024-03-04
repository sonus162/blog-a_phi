<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\NewsModel;

class NewsController extends Controller
{
    private $model;
    public $url;

    public function __construct()
    {
        $this->model =  new NewsModel();
        $this->url = Request::fullUrl();
    }

    public function index(){

        $data['list'] = $this->model->listItem(['columns' => ['id','name','slug','thumbnail','desc_short','user_created', 'created_at']], ['task' => 'frontend-getList']);
        $data['url'] = $this->url;

        return view('Frontend.pages.news.list', compact('data'));
    }

    public function detail(Request $request, $slug, $id){

        $params['id'] = $id;
        $NewsModel = new NewsModel();
        $data['detail'] = $NewsModel->getItem($params, ['task' => 'get-frontend']);
        $data['url'] = $this->url;

        $data['list-sidebar'] = $NewsModel->listItem($params,['task' => 'list-sidebar']);

        if(!empty($data['detail']) && $slug == $data['detail'][0]['slug']){
            $data['detail'] = $data['detail'][0];
            return view('Frontend.pages.news.detail', compact('data'));
        }else {
            abort(404);
        }
    }
}
