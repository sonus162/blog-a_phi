<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EpisodesModel;
use App\Models\FilmCategoryModel;
use Illuminate\Http\Request;
use App\Models\FilmModel;
use App\Models\GenreModel;
use App\Models\CountryModel;

class FilmController extends Controller
{
    private $model;
    private $model_eps;
    private $model_cate;
    private $model_country;
    private $model_genre;

    public function __construct()
    {
        $this->model = new FilmModel();
        $this->model_eps = new EpisodesModel();
        $this->model_cate = new FilmCategoryModel();
        $this->model_country =  new CountryModel();
        $this->model_genre = new GenreModel();
    }

    public function index(){

        $data['listFilm'] = $this->model->listItem(['columns' => ['id','name','slug','thumbnail','status', 'year', 'duration_film']], ['task' => 'frontend-listitem']);
        $data['check_list'] = 1;

        return view('Frontend.module.film.list', [
            'data'  => $data
        ]);
    }

    public function list($type, $slug){

        $type_default = ['danh-muc','the-loai','quoc-gia'];

        if(in_array($type,$type_default)){

            if($type == 'danh-muc'){
                $id_cate = $this->model_cate->getItem(['slug' => $slug, 'columns' => ['id','name','slug']], ['task' => 'get-id']);
                $data['listFilm'] = $this->model->listItem(['columns' => ['id','name','slug','thumbnail','status', 'year', 'duration_film'], 'id_category' => $id_cate], ['task' => 'frontend-listitem_byCategory']);
            } else if($type == 'the-loai'){
                $id_genre = $this->model_genre->getItem(['slug' => $slug, 'columns' => ['id','name','slug']], ['task' => 'get-id']);
                $data['listFilm'] = $this->model->listItem(['columns' => ['id','name','slug','thumbnail','status', 'year', 'duration_film'], 'id_genre' => $id_genre['id']], ['task' => 'frontend-listitem_byGenre']);
            } else if($type == 'quoc-gia'){
                $id_country =  $this->model_country->getItem(['slug' => $slug, 'columns' => ['id','name','slug']], ['task' => 'get-id']);
                $data['listFilm'] = $this->model->listItem(['columns' => ['id','name','slug','thumbnail','status', 'year', 'duration_film'], 'id_country' => $id_country['id']], ['task' => 'frontend-listitem_byCountry']);
            }
            else {
                $data['listFilm'] = $this->model->listItem(['columns' => ['id','name','slug','thumbnail','status', 'year', 'duration_film']], ['task' => 'frontend-listitem']);
            }

            return view('Frontend.module.film.list', compact('data'));
        }else {
            abort(404);
        }
    }

    public function detail($slug) {
        $data['film'] = $this->model->getItem(['slug' => $slug] , ['task' => 'frontend-getItem']);
        $data['country'] =  $this->model_country->getItem(['id' => $data['film']['id_country'],'columns' => ['id','name','slug']], ['task' => 'get-byId']);
        $data['category_film'] = $this->model_cate->getItem(['id' => $data['film']['id_film_category']], ['task' => 'get-byId']);
        $ids_genre = explode(':,:', $data['film']['id_genre']);
        $data['genre'] = $this->model_genre->listItem(['ids' => $ids_genre, 'columns' => ['id','name','slug']], ['task' => 'get-byListId']);

        $data['episodes'] = $this->model_eps->listItem(['id_film' => $data['film']['id']], ['task' => 'get-first_eps-detail_film-frontend']);

        return view('Frontend.module.film.detail', compact('data'));
    }

    public function watching($slug, $eps) {

        $id_film = $this->model->getItem(['slug' => $slug , 'columns' => ['id']], ['task' => 'get-id_film-frontend']);
        $data['list_eps'] = $this->model_eps->listItem(['id_film' => $id_film['id'], 'columns' => ['id','name','slug']], ['task' => 'get-list_eps-watching-frontend']);

        $data['eps'] = $this->model_eps->getItem(['id_film' => $id_film['id'], 'slug' => $eps, ['columns' => ['id','name','link', 'slug']]], ['task' => 'get_eps-frontend']);

        $data['film'] = $this->model->getItem(['id' => $id_film, 'columns' => ['id','name','slug', 'id_film_category']] , ['task' => 'get-film-frontend']);

        $data['film_other'] = $this->model->listItem(['id_film_category' => $data['film']['id_film_category'], 'columns' => ['id','name','thumbnail','slug','duration_film','status','year'], 'limit' => 10], ['task' => 'list_film-category']);

        return view('Frontend.module.film.watching', compact('data'));
    }
}
