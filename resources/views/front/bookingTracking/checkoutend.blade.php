@extends('layouts.00-template')

@section('main')
<div class="container" >
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 382px);padding-top:80px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">預約資料</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>預約編號:{{$new_order->order_number}}</p>
                    <p>日期:{{$new_order->date}}</p>
                    <p>區域:{{$new_order->areaType->name}}</p>
                    <p>姓名:{{$new_order->name}}</p>
                    <p>電話:{{$new_order->phone}}</p>
                    <p>電子信箱:{{$new_order->email}}</p>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
