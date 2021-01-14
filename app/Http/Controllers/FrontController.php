<?php

namespace App\Http\Controllers;

use App\News;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index()
    {
        return view('welcome');
    }
    
    public function news()
    {
        $newsData=News::get();
        return view('front.news.news',compact('newsData'));
    }
    public function product()
    {
        $products= Product::get();
        return view('front.product.index',compact('products'));
    }
    public function detail($id)
    {
        $product= Product::find($id);
        return view('front.product.detail',compact('product'));
    }
    
}
