<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MenuSeoModel;
use App\Models\InfoModel;
use Illuminate\Http\Request;


class HeaderController extends Controller
{
    public function show()
    {
        // Xử lý logic để lấy dữ liệu cho header ở đây
        $data = [];
        $params = [];

        $menu = new MenuSeoModel();
        $info =  new InfoModel();
        $data['menu'] = $menu->listItem(['columns' => ['name','link']], ['task' => 'frontend-getList']);
        $data['info'] = $info->getItem($params, ['task' => 'get-item'])[0];


        return $data;
    }
}
