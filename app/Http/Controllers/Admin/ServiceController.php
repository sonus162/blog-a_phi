<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest as MainRequest;
use App\Models\ServiceModel as MainModel;

class ServiceController extends Controller
{
    public $controllerName = 'service';
    public $name = 'Danh sách dịch vụ';
    private $breadcumb = ['lv1' => 'Dịch vụ', 'lv2' => 'Danh sách dịch vụ'];
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

        return view('Backend.module.service.index',[
            'listItems' => $listItems
        ]);
    }

    public function form(Request $request){

        $item = [];
        if($request->id !=null){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params,['task' => 'get-item'])[0];
        }
        return view('Backend.module.service.form',[
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
            $params["id"]  = $request->id;
            $this->model->deleteItem($params, ['task' => 'delete-item']);
        }
        return 123;
    }

    public function changeDisplay(Request $request){
        $params['id'] = $request->id;
        $params['display'] = $request->status;
        $this->model->saveItem($params, ['task' => 'change-display']);
        $display =  $request->display == 1 ? 0 : 1;

        $link = route($this->controllerName.'/changeDisplay',['status' => $display, 'id' => $params['id']]);
        return response()->json([
            'status' => 'success',
            'link' => $link
        ]);
    }

    public function changeIsHome(Request $request){
        $params['id'] = $request->id;
        $params['is_home'] = $request->status;
        $this->model->saveItem($params, ['task' => 'change-is_home']);
        $is_home =  $request->is_home == 1 ? 0 : 1;

        $link = route($this->controllerName.'/changeIsHome',['status' => $is_home, 'id' => $params['id']]);
        return response()->json([
            'status' => 'success',
            'link' => $link
        ]);
    }
}
