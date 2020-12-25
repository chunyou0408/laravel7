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
Route::get('/', function () {
    return view('welcome');
});

Route::get('news/no001', function () {
    return view('Insidepage01');
});

Route::get('news/no002', function () {
    return view('Insidepage02');
});








//Route::請求方式('網址',function(){要做的事情})
Route::get('/home', function () {
    // $data2=[
    //     'name'=>'leo',
    //     'age'=>18,
    //     'gender'=>'male'
    // ];

    $name = 'leo';
    $age = 18;
    $gender = 'male';


    return view('first')->with(compact('name', 'age','gender'));
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/test1', function () {
    return view('test2');
});

// Route::get('/test1', function () {
//     $name = 'leo';
//     $age = 18;
//     $gender = 'male';
//     return view('first',['name'=>$name,'age'=>$age,'gender'=>$gender]);
// });


