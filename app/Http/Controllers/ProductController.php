<?php

namespace App\Http\Controllers;

use App\Product;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::get();
        return $products;
    }

    //

    public function create()
    {
        //
        Product::create([
            'name' => '香蕉',
            'type' => '123',
            'price' => '123',
            'img' => '123',
            'description' => '123',
            'url' => '123',
        ]);

        $products=Product::get();
        return $products;
    }

    public function delete()
    {
        // $products = Product::find(12);
        // $products->delete();
        // return $products;

        //指定id刪除
        // $product = Product::find(9)->delete();

        //利用where刪除
        $product = Product::where('name','香蕉')->first()->delete();
        return  $product;
    }
    
    public function update(){
        // $product = Product::find(1);
        // $product->name = '香蕉';
        // $product->save();
        // return '成功';

        $product = Product::find(9)->delete();
    }

}
