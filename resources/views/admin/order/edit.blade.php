@extends('layouts.app')

@section('css')
@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/order">返回頁面</a>
    <h2>編輯訂單</h2>
    <hr>
    <form action="/admin/order/update/{{$order->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">訂單編號:</label>
            <input type="text" class="form-control" name="order_number" value="{{$order->order_number}}" required>
        </div>
        <div class="form-group">
            <label for="name">姓名:</label>
            <input type="text" class="form-control" name="name" value="{{$order->name}}" required>
        </div>
        <div class="form-group">
            <label for="address">地址:</label>
            <input class="form-control" id="address" name="address" value="{{$order->address}}" required>
        </div>
        <div class="form-group">
            <label for="phone">電話:</label>
            <input type="text" class="form-control" name="phone"  value="{{$order->phone}}" required >
        </div>
        <div class="form-group">
            <label for="email">電子信箱:</label>
            <input type="text" class="form-control"  name="email" value="{{$order->email}}" required >
        </div>
        <div class="form-group">
            <label for="total_price">總數量:</label>
            <input type="number" class="form-control" name="total_price"  value="{{$order->total_price}}" min="1" required >
        </div>
        <div class="form-group">
            <label for="total_qty">總金額:</label>
            <input type="number" class="form-control"  name="total_qty" value="{{$order->total_qty}}" min="1" required >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>

@endsection

@section('js')

@endsection
