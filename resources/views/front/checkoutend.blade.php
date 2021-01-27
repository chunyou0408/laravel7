@extends('layouts.00-template')

@section('main')
<div class="container" >
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 382px);padding-top:80px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">付款結果</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>訂單編號:{{$new_order->order_number}}</p>
                    <p>訂單狀態:{{$new_order->status}}</p>
                    <p>地址:{{$new_order->address}}</p>
                    <p>電話:{{$new_order->phone}}</p>
                    <p>電子信箱:{{$new_order->email}}</p>
                    <hr>
                    <p>總數量:{{$new_order->total_qty}}</p>
                    <p>總金額:{{$new_order->total_price}}</p>
                    <hr>
                    <p>訂單商品明細</p>
                    @foreach ($new_order->details as $detail)
                    <p>商品名稱:{{$detail->name}} 價格: {{$detail->price}} 數量: {{$detail->qty}}  </p>
                    @endforeach


                    {{-- {{$new_order,$total,$getContent}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
