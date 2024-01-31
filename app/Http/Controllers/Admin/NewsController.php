<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest as MainRequest;
use App\Models\NewsModel as MainModel;
use App\Models\NewsCategoryModel;


class NewsController extends Controller
{
    public $controllerName = 'news';
    public $name = 'Danh sách Bài viết';
    private $breadcumb = ['lv1' => 'Tin tức', 'lv2' => 'Danh sách Bài viết'];
    private $model;
    private $params = [];

    public function __construct()
    {
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
        view()->share('breadcumb', $this->breadcumb);
    }

    public function index(){

        $listItems = $this->model->listItem($this->params, ['task' => 'admin-listitem']);

        return view('Backend.module.news.list_news.index',[
            'listItems' => $listItems
        ]);
    }

    public function form(Request $request){
        $item = [];
        if($request->id !=null){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params,['task' => 'get-item'])[0];
        }

        // Lấy danh sách danh mục
        $NewsCategoryModel = new NewsCategoryModel();
        $news_cate = $NewsCategoryModel->listItem($this->params,['task' => 'admin-listitem']);

        return view('Backend.module.news.list_news.form',[
            'item' => $item,
            'news_cate' => $news_cate
        ]);
    }

    public function save(MainRequest $request){
        if ($request->method() == 'POST') {
            $params = $request->all();

            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if($params['id'] != null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            if(isset($params['check_new'])){
                return back();
            }else {
                return redirect()->route($this->controllerName);
            }
        }
    }

    public function delete(Request $request){
        $ids = $request->ids;
        if(!empty($ids)){
            $params['ids'] = $ids;
            $this->model->deleteItem($params,['task' => 'delete-items']);
        }else {
            $params["id"]             = $request->id;
            $this->model->deleteItem($params, ['task' => 'delete-item']);
        }
        return 123;
    }
}
