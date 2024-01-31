<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Frontend\HeaderController;


// FRONTEND
Route::namespace('Frontend')->group(function () {

    $controllerName = 'index';
    $prefix         = '';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
    });

    Route::get('/header', 'HeaderController@show');
    Route::get('phim.html', 'FilmController@index')->name('film.index');
    Route::get('phim/{slug}.html', 'FilmController@detail')->name('film.detail');
    Route::get('xem-phim/{name_film}/{eps}.html', 'FilmController@watching')->where(['slug' => '[a-z\-]+', 'id' => '[0-9]+'])->name('film.watching');
    Route::get('{type}/{slug}.html', 'FilmController@list')->name('film.list');

    Route::get('tin-tuc.html', 'NewsController@index')->name('news.index');
    Route::get('tin-tuc/{slug}', 'NewsController@detail')->name('news.detail');
    Route::post('binh-luan','CommentController@comment')->name('binh-luan');



    // Route::get('quoc-gia/{slug}.html', 'FilmController@list');
    // Route::get('the-loai/{slug}.html', 'FilmController@list');

});




// BACKEND
$prefixAdmin = 'admin';
Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin'], function () {

    // Route::group(['middleware' => 'admin'], function () {
        $prefix         = '';
        $controllerName = 'dashboard';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        });

        // Fim
        $prefix = 'film';
        $controllerName = 'film';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',                              [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',                    [ 'as' => $controllerName.'/form',          'uses' => $controller . 'form' ]);
            Route::post('/save',                         [ 'as' => $controllerName.'/save',          'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',                  [ 'as' => $controllerName.'/delete',        'uses' => $controller . 'delete' ]);
            Route::get('/changeDisplay-{status}/{id?}',  [ 'as' => $controllerName.'/changeDisplay',  'uses' => $controller . 'changeDisplay' ]);
            Route::post('/addFilm',                         [ 'as' => $controllerName.'/addFilm',          'uses' => $controller . 'addFilm' ]);
        });

        // danh mục Film
        $prefix = 'filmCategory';
        $controllerName = 'filmCategory';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                 'uses' => $controller . 'delete' ]);
        });

        // Quốc gia
        $prefix = 'country';
        $controllerName = 'country';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
        });

        // Thể loại
        $prefix = 'genre';
        $controllerName = 'genre';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
        });

        // Thể loại
        $prefix = 'episodes';
        $controllerName = 'episodes';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
        });

         // Banner - Slide
         $prefix = 'banner';
         $controllerName = 'banner';
         Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
             $controller = ucfirst($controllerName)  . 'Controller@';
             Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
             Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
             Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
             Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
             Route::get('/orderBy/{id}',     [ 'as' => $controllerName.'/orderBy',                  'uses' => $controller . 'orderBy' ]);
         });

        // Danh mục tin tức
        $prefix = 'newsCategory';
        $controllerName = 'newsCategory';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
        });

        // Tin tức
        $prefix = 'news';
        $controllerName = 'news';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                 'uses' => $controller . 'delete' ]);
        });

        // User
        $prefix = 'user';
        $controllerName = 'user';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',              [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',    [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',         [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::post('/change-password',         [ 'as' => $controllerName.'/change-password',                  'uses' => $controller . 'changePassword' ]);
            Route::post('/change-role',         [ 'as' => $controllerName.'/change-role',                  'uses' => $controller . 'changeRole' ]);
            Route::get('/delete/{id?}',  [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
            Route::get('/change-status-{status}/{id?}', [ 'as' => $controllerName.'/change-status',                  'uses' => $controller . 'changeStatus' ]);
        });

        $prefix = 'member';
        $controllerName = 'member';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',              [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',    [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',         [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::post('/change-password',         [ 'as' => $controllerName.'/change-password',                  'uses' => $controller . 'changePassword' ]);
            Route::get('/delete/{id?}',  [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
            Route::get('/change-status-{status}/{id?}', [ 'as' => $controllerName.'/change-status',                  'uses' => $controller . 'changeStatus' ]);
        });

        $prefix = 'comment';
        $controllerName = 'comment';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',              [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',    [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',         [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::post('/change-password',         [ 'as' => $controllerName.'/change-password',                  'uses' => $controller . 'changePassword' ]);
            Route::get('/delete/{id?}',  [ 'as' => $controllerName.'/delete',                'uses' => $controller . 'delete' ]);
            Route::get('/change-status-{status}/{id?}', [ 'as' => $controllerName.'/change-status',                  'uses' => $controller . 'changeStatus' ]);
            Route::get('/change-statusDT-{status}/{id?}', [ 'as' => $controllerName.'/change-statusDT',                  'uses' => $controller . 'changeStatusDT' ]);
        });

    // });
    $prefix = '';
    $controllerName = 'auth';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/login',              [ 'as' => $controllerName.'/login',                          'uses' => $controller . 'login' ]);
        Route::post('/postLogin',    [ 'as' => $controllerName.'/postLogin',                  'uses' => $controller . 'postLogin' ]);
        Route::get('/logout',              [ 'as' => $controllerName.'/logout',                          'uses' => $controller . 'logout' ]);
    });
});

