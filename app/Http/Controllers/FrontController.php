<?php

namespace App\Http\Controllers;

use App\News;
use App\Order;
use App\Booking;
use App\Product;
use App\Suggest;
use App\AreaType;
use Carbon\Carbon;
use App\OrderDetail;
use App\ProductType;
use Illuminate\Http\Request;
use TsaiYiHua\ECPay\Checkout;
use Illuminate\Support\Facades\Auth;
use TsaiYiHua\ECPay\Services\StringService;

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
    public function pasture(){
        return view('front.03-pasture');
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

    public function suggest_store(Request $request){
        Suggest::create($request->all());
        return redirect('/suggest');
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

    public function checkoutInformation(){
        return view('front.checkout.information');
    }

    public function orderTracking(){
        //先取得目前的使用者id
        $id = Auth::user()->id;
        //利用使用者id查詢所有訂單
        $orders = Order::where('user_id',$id)->get();
        //顯示到畫面上,並將資料compact起來
        return view('front.orderTracking.index',compact('orders'));
    }
    public function bookingTracking(){
        $id = Auth::user()->id;
        $bookings = Booking::where('user_id',$id)->get();
        // dd($orders);
        return view('front.bookingTracking.index',compact('bookings'));
    }


    public function bookingCheckoutend($order_number){
        $new_order = Booking::where('order_number',$order_number)->first();
        return view('front.bookingTracking.checkoutend',compact('new_order'));
    }

    public function createOrder(Request $request)
    {
        $dt=Carbon::now();
        $order_number = 'DP'.$dt->year.$dt->month.$dt->day.$dt->hour.$dt->minute.$dt->second;

        //取得車內所有物品
        $cartCollectinon= \Cart::getContent();

        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'total_price'=>\Cart::getTotal(),
            'total_qty'=>\Cart::getTotalQuantity(),
            'name'=> $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'email'=> $request->email,
            'order_number'=>$order_number,
            'status'=>'未付款',
        ]);



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

        // return redirect('/admin/order');

        return $this->checkout->setNotifyUrl(route('notify'))->setReturnUrl(route('return'))->setPostData($formData)->send();

    }

    public function notifyUrl(Request $request){
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            return '1|OK';
        } else {
            return '0|FAIL';
        }
    }

    public function returnUrl(Request $request){
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            if (!empty($request->input('redirect'))) {
                return redirect($request->input('redirect'));
            } else {

                //付款完成，下面接下來要將購物車訂單狀態改為已付款
                //目前是顯示所有資料將其DD出來
                // dd($this->checkoutResponse->collectResponse($serverPost));

                $order_number = $serverPost["MerchantTradeNo"];
                $order = Order::where('order_number',$order_number)->first();
                $order->status = "已付款完成";
                $order->save();

                return redirect("/checkoutend/{$order_number}");
            }
        }
    }

    public function checkoutend($order_number){
        $new_order = Order::where('order_number',$order_number)->first();


        // $new_order = Order::where('order_number',$order_number)->with('orderitems')->first();
        // $userId = auth()->user()->id;
        // $total = \Cart::session($userId)->getTotal();
        // $getContent = \Cart::session($userId)->getContent()->sort();

        return view('front.checkoutend',compact('new_order'));
   }



    public function areaTypes(Request $request){
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
        $dt=Carbon::now();
        $order_number = 'BP'.$dt->year.$dt->month.$dt->day.$dt->hour.$dt->minute.$dt->second;


        $data = Booking::create([
            'user_id'=>Auth::user()->id,
            'date'=>$request->date,
            'area_id'=> $request->area_id,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'order_number'=>$order_number,
        ]);

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
