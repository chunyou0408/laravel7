<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsContoller;

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

Route::get('/','FrontController@index');

Auth::routes();

Route::group(['middleware' => ['auth'],'prefix'=>'admin'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');

        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/update/{id}', 'ProductController@update');

        Route::get('/destroy/{id}', 'ProductController@destroy');
    });

    Route::group(['prefix' => 'product_type'], function () {
        Route::get('/', 'ProductTypeController@index');
        Route::get('/create', 'ProductTypeController@create');
        Route::post('/store', 'ProductTypeController@store');

        Route::get('/edit/{id}', 'ProductTypeController@edit');

        Route::post('/update/{id}', 'ProductTypeController@update');
        Route::get('/destroy/{id}', 'ProductTypeController@destroy');
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'NewsController@index');
        Route::get('/create', 'NewsController@create');
        Route::post('/store', 'NewsController@store');

        Route::get('/edit/{id}', 'NewsController@edit');

        Route::post('/update/{id}', 'NewsController@update');
        Route::get('/destroy/{id}', 'NewsController@destroy');
    });

    Route::group(['prefix' => 'news_type'], function () {
        Route::get('/', 'NewsTypeController@index');
        Route::get('/create', 'NewsTypeController@create');
        Route::post('/store', 'NewsTypeController@store');

        Route::get('/edit/{id}', 'NewsTypeController@edit');

        Route::post('/update/{id}', 'NewsTypeController@update');
        Route::get('/destroy/{id}', 'NewsTypeController@destroy');
    });


});
