@extends('layouts.app')

@section('css')

@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/product">返回頁面</a>
    <h2>編輯產品</h2>
    <hr>
    <form action="/admin/product/update/{{$product->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type_id">類別:</label>
            <select class="form-control" id="type_id" name="type_id" required>
                @foreach ($productTypes as $productType)
                    <option value="{{$productType->id}}"
                    @if ($product->type_id == $productType->id)
                       selected     
                    @else

                    @endif 
                    >{{$productType->name}}</option>     
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">名稱:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required>
        </div>
        <div class="form-group">
            <label for="price">價格:</label>
            <input type="number" class="form-control" min="0" id="price" name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-group">
            <label for="img">目前圖片</label>
            <img src="{{$product->img}}" alt="200">
        </div>
        <div class="form-group">
            <label for="img">重新上傳圖片:</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>
        <div class="form-group">
            <label for="description">描述:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{$product->description}}</textarea>
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