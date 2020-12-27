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
    return view('news');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('news/no001', function () {
    return view('Insidepage01');
});

Route::get('news/no002', function () {
    return view('Insidepage02');
});

Route::get('news/no003', function () {
    return view('Insidepage03');
});

Route::get('news/no004', function () {
    return view('Insidepage04');
});

