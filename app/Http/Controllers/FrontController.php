<?php

namespace App\Http\Controllers;

use App\News;
use App\Order;
use App\Booking;
use App\Product;
use Carbon\Carbon;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function productDetail($id)
    {
        $product= Product::find($id);
        return view('front.product.detail',compact('product'));
    }

    public function checkout()
    {
        $carts = \Cart::getContent();
        return view('front.checkout.index',compact('carts'));
    }

    public function createOrder()
    {
        $dt=Carbon::now();
        $order_number = 'DP'.$dt->year.$dt->month.$dt->day.$dt->hour.$dt->minute.$dt->second;

        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'total_price'=>'0',
            'total_qty'=>'0',
            'phone'=>'0930123456',
            'address'=>'台中市XXX...',
            'name'=>'測試測試',
            'email'=>'9999@gmail.com',
            'order_number'=>$order_number,
        ]);

        //取得車內所有物品
        $cartCollectinon= \Cart::getContent();

        foreach ($cartCollectinon as $item) {
            $product =Product::find($item->id);

            OrderDetail::create([
                'product_id'=>$product->id,
                'order_id'=>$order->id,
                'name'=>$product->name,
                'price'=>$product->price,
                'qty'=>$item->quantity,
                'img'=>$product->img,
            ]);
        }

        \Cart::clear();

        return redirect('/admin/order');
    }


    //
    public function booking(){
        return view('front.booking.index');
    }

    public function bookingSearch(Request $request){



        $dt = Carbon::create(2021, 1, 1, 0);


        for ($i=0; $i <= 30; $i++) {
            $bookings[$i]= Booking::whereDate('date', '=', $dt)->get();

            $dt->addDay();
        }









        // $dt = Carbon::now();

        // $to = Carbon::now();
        // $to->addDay();
        // $to->addDay();

        // $bookings[0]= Booking::whereBetween('date', [$dt , $to])->where('area',1)->get();
        // $bookings[1]= Booking::whereBetween('date', [$dt , $to])->where('area',2)->get();
        // $bookings[2]= Booking::whereBetween('date', [$dt , $to])->where('area',3)->get();
        // $bookings[3]= Booking::whereBetween('date', [$dt , $to])->where('area',4)->get();
        // $bookings[4]= Booking::whereBetween('date', [$dt , $to])->where('area',5)->get();


        return $bookings;
    }



}
