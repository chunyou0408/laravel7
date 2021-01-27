@extends('layouts.app')

@section('css')
@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/news">返回頁面</a>
    <h2>編輯訂單</h2>
    <hr>
    <form action="/admin/news/update/{{$order->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">姓名:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$order->name}}" required>
        </div>
        <div class="form-group">
            <label for="content">地址:</label>
            <input class="form-control" id="content" name="content" value="{{$order->address}}" required>
        </div>
        <div class="form-group">
            <label for="date">電話:</label>
            <input type="text" class="form-control"  value="{{$order->phone}}" required >
        </div>
        <div class="form-group">
            <label for="email">電子信箱:</label>
            <input type="text" class="form-control"  value="{{$order->email}}" required >
        </div>
        <div class="form-group">
            <label for="total_price">總數量:</label>
            <input type="number" class="form-control"  value="{{$order->total_price}}" min="1" required >
        </div>
        <div class="form-group">
            <label for="qty">總金額:</label>
            <input type="number" class="form-control"  value="{{$order->total_qty}}" min="1" required >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>

@endsection

@section('js')

@endsection
