<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentModel;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public $model = '';
    public function __construct()
    {
        $this->model = new CommentModel();
    }

    public function comment(Request $request){
        $params = $request->all();
        $this->model->saveItem($params, ['task' => 'add-comment']);
    }
}
