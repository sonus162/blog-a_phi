<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest as MainRequest;
use App\Models\UserModel as MainModel;

class UserController extends Controller
{
    public $controllerName = 'user';
    public $name = 'Danh sách User';
    private $breadcumb = ['lv1' => 'User', 'lv2' => 'Danh sách User'];
    private $model;
    private $params = [];
    public $status  = [
        ['name' => 'Kích hoạt', 'status' => 'active'],
        ['name' => 'Chưa Kích hoạt', 'status' => 'inactive'],
    ];

    public function __construct()
    {
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
        view()->share('breadcumb', $this->breadcumb);
    }

    public function index(){

        $listItems = $this->model->listItem($this->params, ['task' => 'admin-listitem']);

        return view('Backend.module.user.list_user.index',[
            'listItems' => $listItems,
            'status' => $this->status,
        ]);
    }

    public function form(Request $request){

        $item = [];
        $params = [];

        if($request->id !=null){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params,['task' => 'get-item'])[0];
        }
        $listRole = $this->model->getListRole($params);

        return view('Backend.module.user.list_user.form',[
            'item' => $item,
            'status' => $this->status,
            'listRole' => $listRole
        ]);
    }

    public function save(MainRequest $request){
        if ($request->method() == 'POST') {
            $params = $request->all();

            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if(isset($params['id'])) {
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

    public function changePassWord(MainRequest $request){
        $params = $request->all();
        $this->model->saveItem($params, ['task' => 'change-password']);
        return redirect()->route($this->controllerName)->with('notify','Cập nhật mật khẩu thành công');
    }

    public function changeRole(MainRequest $request){
        $params = $request->all();
        $this->model->saveItem($params, ['task' => 'change-role']);
        return redirect()->route($this->controllerName)->with('notify','Cập nhật quyền thành công');
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

    public function changeStatus(Request $request){
        $params["id"]   = $request->id;
        $params["currentStatus"] = $request->status;

        $this->model->saveItem($params, ['task' => 'change-status']);
        $notify = 'Cập nhật thành công';
        return response()->json(['notify' => $notify]);
    }
}
