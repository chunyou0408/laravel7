<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //
    public function addCart(Request $request)
    {
        //利用ID找到產品
        $product = Product::find($request->id);
        //判斷是否找到產品
        if($product){
            //將產品輸入購物車
            \Cart::add(array(
                'id' => $product->id, // inique row ID
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->qty,
                'attributes' => array()
            ));
            //抓出所有存在購物車產品的數量
            $cartTotalQuantity = \Cart::getTotalQuantity();
            //返回購物車中產品種數
            return $cartTotalQuantity;
        }
        else{
            return 'false';
        }
    }

    public function delCart(Request $request)
    {
        //刪除車子內符合ID的產品
        //$request->id
        \Cart::remove($request->id);
        //抓出所有存在購物車裡產品數量
        $cartTotalQuantity=\Cart::getTotalQuantity();
        //返回購物車中產品總數
        return $cartTotalQuantity;
    }

    public function updateCart(Request $request)
    {
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));

        // 抓出所有存在購物車裡產品的數量
        $cartTotalQuantity =\Cart::getTotalQuantity();
        // 返回購物車中產品數量
        return $cartTotalQuantity;

    }

}
