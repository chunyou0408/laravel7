@extends('layouts.app')

@section('css')

@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/product_type">返回頁面</a>
    <h2>編輯產品類別:</h2>
    <hr>
    <form action="/admin/product_type/update/{{$productType->id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">類別:</label>
            <input type="text" class="form-control" min="1" id="name" name="name" value="{{$productType->name}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>







{{--

<form action="/admin/product/update/{{$data->id}}" method="post">
    @csrf
    <div class="_button"><a href="/admin/product">返回首頁</a></div>

    <div class="form-group">
        <h1>編輯產品資料</h1>
    </div>
    <div class="form-group">
        類別:
        <input type="text" name="type_id" id="type_id" value="{{$data->type_id}}" required>
    </div>
    <div class="form-group">
        名稱:
        <input type="text" name="name" id="name" value="{{$data->name}}" required>
    </div>
    <div class="form-group">
        價格:
        <input type="text" name="price" id="price" value="{{$data->price}}" required>
    </div>
    <div class="form-group">
        圖片:
        <input type="text" name="img" id="img" value="{{$data->img}}" required>
    </div>
    <div class="form-group">
        描述:
        <textarea  cols="30" rows="10" name="description" id="description" required>{{$data->description}}</textarea>
    </div>
    <div class="form-group">
        <button>送出</button>
    </div>
</form> --}}
@endsection

@section('js')

@endsection
