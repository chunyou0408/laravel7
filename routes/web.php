<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsContoller;
use Illuminate\Support\Facades\Storage;

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

// Route::get('/','FrontController@index');
// Route::get('/news','FrontController@news');
Route::get('/product','FrontController@product');

Route::get('/test',function(){
    dd('test');
})->middleware('is_admin');



Route::get('/product_detail/{id}','FrontController@productDetail');

Route::get('/checkout','FrontController@checkout');
Route::get('/create_order','FrontController@createOrder');

Route::get('/booking','FrontController@booking');
Route::post('/booking_search','FrontController@bookingSearch');
Route::post('/booking_store', 'FrontController@bookingStore');
Route::post('/area_types', 'FrontController@areaTypes');

Route::post('/add_cart','ShoppingCartController@addCart');
Route::post('/del_cart','ShoppingCartController@delCart');
Route::post('/update_cart','ShoppingCartController@updateCart');



Auth::routes([
    // 'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/test_check_out','FrontController@test_check_out');

// Route::prefix('cart_ecpay')->group(function(){

//     //當消費者付款完成後，綠界會將付款結果參數以幕後(Server POST)回傳到該網址。
//     Route::post('notify', 'CartController@notifyUrl')->name('notify');

//     //付款完成後，綠界會將付款結果參數以幕前(Client POST)回傳到該網址
//     Route::post('return', 'CartController@returnUrl')->name('return');
// });


//專題使用者區域
Route::get('/','FrontController@index');
Route::get('/about_us','FrontController@about_us');
Route::get('/pasture','FrontController@pasture');
Route::get('/news','FrontController@news');
Route::get('/camping','FrontController@camping');
Route::get('/shopping','FrontController@shopping');
Route::get('/suggest','FrontController@suggest');


Route::get('/home', 'HomeController@userIndex');







Route::group(['middleware' => ['auth','is_admin'],'prefix'=>'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    //管理員的註冊
    Route::get('/register', 'Auth\RegisterController@showAdminRegistrationForm');
    Route::post('/register', 'Auth\RegisterController@admin_register');


    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');

        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/update/{id}', 'ProductController@update');

        Route::get('/destroy/{id}', 'ProductController@destroy');
        //刪除圖片
        Route::post('/delete_img', 'ProductController@deleteImg');
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

    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'OrderController@index');
        Route::get('/create', 'OrderController@create');
        Route::post('/store', 'OrderController@store');

        Route::get('/edit/{id}', 'OrderController@edit');

        Route::post('/update/{id}', 'OrderController@update');
        Route::get('/destroy/{id}', 'OrderController@destroy');
    });

    Route::group(['prefix' => 'booking'], function () {
        Route::get('/', 'BookingController@index');
        Route::get('/create', 'BookingController@create');
        Route::post('/store', 'BookingController@store');

        Route::get('/edit/{id}', 'BookingController@edit');

        Route::post('/update/{id}', 'BookingController@update');
        Route::get('/destroy/{id}', 'BookingController@destroy');
    });

    Route::group(['prefix' => 'area_type'], function () {
        Route::get('/', 'AreaTypeController@index');
        Route::get('/create', 'AreaTypeController@create');
        Route::post('/store', 'AreaTypeController@store');

        Route::get('/edit/{id}', 'AreaTypeController@edit');

        Route::post('/update/{id}', 'AreaTypeController@update');
        Route::get('/destroy/{id}', 'AreaTypeController@destroy');
    });


    Route::group(['prefix' => 'suggest'], function () {
        Route::get('/', 'SuggestController@index');
        // Route::get('/create', 'SuggestController@create');
        Route::post('/store', 'SuggestController@store');

        // Route::get('/edit/{id}', 'SuggestController@edit');

        // Route::post('/update/{id}', 'SuggestController@update');
        Route::get('/destroy/{id}', 'SuggestController@destroy');
    });


    Route::get('/test', function () {
        Storage::disk('local')->put('/public/example.txt', 'Contents');
    });

});
