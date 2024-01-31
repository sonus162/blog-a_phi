<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerModel as MainModel;
use App\Http\Requests\BannerRequest as MainRequest;

class BannerController extends Controller
{
    public $controllerName = 'banner';
    public $name = 'Danh sách Slide';
    private $breadcumb = ['lv1' => 'Slide', 'lv2' => 'Danh sách Slide'];
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

        return view('Backend.module.banner.index',[
            'listItems' => $listItems
        ]);
    }

    public function form(Request $request){

        $item = [];
        if($request->id !=null){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params,['task' => 'get-item'])[0];
        }
        return view('Backend.module.banner.form',[
            'item' => $item
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

    public function orderBy(Request $request){
        $params = $request->all();
        $this->model->saveItem($params, ['task' => 'change-orderby']);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
