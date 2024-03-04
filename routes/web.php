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
    // Route::get('phim.html', 'FilmController@index')->name('film.index');
    // Route::get('phim/{slug}.html', 'FilmController@detail')->name('film.detail');
    // Route::get('xem-phim/{name_film}/{eps}.html', 'FilmController@watching')->where(['slug' => '[a-z\-]+', 'id' => '[0-9]+'])->name('film.watching');
    // Route::get('{type}/{slug}.html', 'FilmController@list')->name('film.list');

    Route::get('bai-viet.html', 'NewsController@index')->name('news.index');
    Route::get('dich-vu.html', 'ServiceController@index')->name('service.index');
    Route::get('bai-viet/{slug}-{id}.html', 'NewsController@detail')->where(['slug' => '[a-zA-Z0-9\-]+', 'id' => '[0-9]+'])->name('news.detail');

    // Route::get('quoc-gia/{slug}.html', 'FilmController@list');
    // Route::get('the-loai/{slug}.html', 'FilmController@list');

});




// BACKEND
$prefixAdmin = 'admin';
Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin'], function () {

    Route::group(['middleware' => 'admin'], function () {
        $prefix         = '';
        $controllerName = 'dashboard';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
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

        // Bài viết
        $prefix = 'news';
        $controllerName = 'news';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
            Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                 'uses' => $controller . 'delete' ]);
            Route::get('/changeDisplay-{status}/{id?}',  [ 'as' => $controllerName.'/changeDisplay',  'uses' => $controller . 'changeDisplay' ]);
            Route::get('/changeIsHome-{status}/{id?}',  [ 'as' => $controllerName.'/changeIsHome',  'uses' => $controller . 'changeIsHome' ]);
            Route::get('/changeIsSidebar-{status}/{id?}',  [ 'as' => $controllerName.'/changeIsSidebar',  'uses' => $controller . 'changeIsSidebar' ]);
        });

        // Dịch vụ
         $prefix = 'service';
        $controllerName = 'service';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
             $controller = ucfirst($controllerName)  . 'Controller@';
             Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
             Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
             Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
             Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                 'uses' => $controller . 'delete' ]);
             Route::get('/changeDisplay-{status}/{id?}',  [ 'as' => $controllerName.'/changeDisplay',  'uses' => $controller . 'changeDisplay' ]);
             Route::get('/changeIsHome-{status}/{id?}',  [ 'as' => $controllerName.'/changeIsHome',  'uses' => $controller . 'changeIsHome' ]);
        });

        // Section trang chủ
        $prefix = 'section';
        $controllerName = 'section';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
        });

        // Thông tin web
        $prefix = 'info';
        $controllerName = 'info';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
            Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
        });

        // menu seo
        $prefix = 'menuSeo';
        $controllerName = 'menuSeo';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
             $controller = ucfirst($controllerName)  . 'Controller@';
             Route::get('/',               [ 'as' => $controllerName,                          'uses' => $controller . 'index' ]);
             Route::get('/form/{id?}',     [ 'as' => $controllerName.'/form',                  'uses' => $controller . 'form' ]);
             Route::post('/save',          [ 'as' => $controllerName.'/save',                  'uses' => $controller . 'save' ]);
             Route::get('/delete/{id?}',   [ 'as' => $controllerName.'/delete',                 'uses' => $controller . 'delete' ]);
             Route::get('/changeDisplay-{status}/{id?}',  [ 'as' => $controllerName.'/changeDisplay',  'uses' => $controller . 'changeDisplay' ]);
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

    });
    $prefix = '';
    $controllerName = 'auth';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/login',              [ 'as' => $controllerName.'/login',                          'uses' => $controller . 'login' ]);
        Route::post('/postLogin',    [ 'as' => $controllerName.'/postLogin',                  'uses' => $controller . 'postLogin' ]);
        Route::get('/logout',              [ 'as' => $controllerName.'/logout',                          'uses' => $controller . 'logout' ]);
    });
});


