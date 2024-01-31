<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FilmCategoryModel;
use App\Models\GenreModel;
use App\Models\CountryModel;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function show()
    {
        // Xử lý logic để lấy dữ liệu cho header ở đây
        $data = [];
        $params = [];

        $FilmCategoryModel = new FilmCategoryModel();
        $data['cate_film'] = $FilmCategoryModel->listItem(['columns' => ['id','name','slug']], ['task' => 'frontend-listitem']);

        $GenreModel = new GenreModel();
        $data['genre'] = $GenreModel->listItem(['columns' => ['id','name','slug']], ['task' => 'frontend-listitem']);

        $CountryModel = new CountryModel();
        $data['country'] = $CountryModel->listItem(['columns' => ['id','name','slug']], ['task' => 'frontend-listitem']);


        return $data;
    }
}
