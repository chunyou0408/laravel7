<?php

use App\Http\Controllers\NewsContoller;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/news','NewsContoller@index');

Route::get('/','FrontContoller@index');

Route::get('/news_detail_01','NewsContoller@detail01');

Route::get('/news_detail_02','NewsContoller@detail02');

Route::get('/news_detail_03','NewsContoller@detail03');

Route::get('/news_detail_04','NewsContoller@detail04');

Route::get('/news_detail_05','NewsContoller@detail05');










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


