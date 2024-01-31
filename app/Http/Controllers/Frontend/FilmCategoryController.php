<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilmCategoryController extends Controller
{
    public function index($type,$slug){
        echo '<pre style="color:red;font-weight:bold">';
        print_r($slug);
        echo '</pre>';
        // return view('Frontend.module.film.list');
    }
}
