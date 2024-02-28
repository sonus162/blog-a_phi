<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest as MainRequest;
use App\Models\InfoModel as MainModel;

class InfoController extends Controller
{
    public $controllerName = 'info';
    public $name = 'Thông tin web';
    private $breadcumb = ['lv1' => 'web', 'lv2' => 'Thông tin web'];
    private $model;
    private $params = [];

    public function __construct()
    {
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
        view()->share('breadcumb', $this->breadcumb);
    }

    public function index(){

        $item = $this->model->getItem($this->params, ['task' => 'get-item']);
        return view('Backend.module.info.index',[
            'item' => $item[0]
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
            return redirect()->route($this->controllerName);

        }
    }
}
