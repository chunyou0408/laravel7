<?php

namespace App\Http\Controllers;

use App\News;
use App\Order;
use App\Booking;
use App\Product;
use App\AreaType;
use Carbon\Carbon;
use App\OrderDetail;
use App\ProductType;
use Illuminate\Http\Request;
use TsaiYiHua\ECPay\Checkout;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    protected $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

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
        return view('front.01-index');
        // return view('welcome');

    }

    public function about_us()
    {
        return view('front.02-about_us');
    }
    public function news()
    {
        $newsData=News::get();
        return view('front.04-news',compact('newsData'));
    }

    public function camping()
    {
        return view('front.05-camping');
    }

    public function shopping()
    {
        $products=Product::get();
        $productTypes=ProductType::get();
        return view('front.06-shopping',compact('products','productTypes'));
    }

    public function suggest(){
        return view('front.07-suggest');
    }

    // public function news()
    // {
    //     $newsData=News::get();
    //     return view('front.news.news',compact('newsData'));
    // }

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

        $items=[];

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

            $new_ary = [
                'name' => $product->name,
                'qty' => $item->quantity,
                'price' => $product->price,
                'unit' => '個'
            ];

            array_push($items, $new_ary);
        }

         //第三方支付
         $formData = [
            'UserId' => Auth::user()->id, // 用戶ID , Optional
            'OrderId' => 'DP'.$dt->year.$dt->month.$dt->day.$dt->hour.$dt->minute.$dt->second,
            'ItemDescription' => '產品簡介',
            'Items' => $items,
            'TotalAmount' => \Cart::getTotal(),
            'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
        ];

        \Cart::clear();

        return $this->checkout->setNotifyUrl(route('notify'))->setReturnUrl(route('return'))->setPostData($formData)->send();
        // return redirect('/admin/order');
    }


    public function area_types(Request $request){
        $areaTypes=AreaType::get();
        return $areaTypes;
    }


    //
    public function booking(){

        $areaTypes=AreaType::get();
        return view('front.booking.index',compact('areaTypes'));
    }

    public function bookingSearch(Request $request){

        $dt = Carbon::create($request->year, ($request->month+1), 1, 0);


        for ($i=0; $i <= $request->lastDay; $i++) {
            $bookings[$i]= Booking::whereDate('date', '=', $dt)->get();

            $dt->addDay();
        }

        return $bookings;
    }


    public function bookingStore(Request $request){
        //
        $data = Booking::create($request->all());
        $data->areaType;
        return $data;
    }


    public function test_check_out(){

        $formData = [
            'UserId' => Auth::user()->id, // 用戶ID , Optional
            'ItemDescription' => '產品簡介',
            'ItemName' => 'Product Name',
            'TotalAmount' => \Cart::getTotal(),
            'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
        ];
        return $this->checkout->setPostData($formData)->send();

    }



}
