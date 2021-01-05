<?php

use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//最新消息首頁
Route::get('/news','NewsContoller@index');

Route::get('/','FrontContoller@index');
//最新消息第一篇
Route::get('/news_detail_01','NewsContoller@detail01');
//最新消息第二篇
Route::get('/news_detail_02','NewsContoller@detail02');
//最新消息第三篇
Route::get('/news_detail_03','NewsContoller@detail03');
//最新消息第四篇
Route::get('/news_detail_04','NewsContoller@detail04');
//最新消息第五篇
Route::get('/news_detail_05','NewsContoller@detail05');
//最新消息-新增資料
Route::get('/news_create','NewsContoller@create');
//最新消息-刪除資料
Route::get('/news_delete','NewsContoller@delete');


Route::get('/product','ProductController@index');

Route::get('/update_product','ProductController@update');

Route::get('/create_product','ProductController@create');

Route::get('/delete_product','ProductController@delete');

Route::get('/create_contact_us','ContactUsController@create');

// Route::get('/contact_us','ContactUsController@index');

// Route::post('/contact_us/store','ContactUsController@store');

//群組

Route::prefix('contact_us')->group(function() {
    Route::get('/','ContactUsController@index');
    Route::get('/create','ContactUsController@create');
    Route::post('/store','ContactUsController@store');
    Route::get('/edit/{id}','ContactUsController@edit');    //開啟編輯頁面
    Route::post('/updata/{id}','ContactUsController@updata');  //執行更新
    Route::get('/destroy/{id}','ContactUsController@destroy');  //執行刪除
    
});

// Route::get('/test/{id?}/{data?}',function ($id='QQQ',$data=123) {
//     dd($id.$data);
// });


// Route::get('/test/{id}/{data}',function ($id,$data) {
//     dd($id.$data);
// });




// Route::get('網址','NewsContoller@函式名稱');

// Route::get('/news', function () {
//     return view('news');
// });

// Route::get('news/no001', function () {
//     return view('Insidepage01');
// });

// Route::get('news/no002', function () {
//     return view('Insidepage02');
// });

// Route::get('news/no003', function () {
//     return view('Insidepage03');
// });

// Route::get('news/no004', function () {
//     return view('Insidepage04');
// });

// Route::get('news/no005', function () {
//     return view('Insidepage05');
// });



// Route::get('/test',function(Request $request){
//     //取得所有參數
//     // dd($request->all());
//     //取得指定參數
//     dd($request->ans);
// });