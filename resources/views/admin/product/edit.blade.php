@extends('layouts.app')

@section('css')
<style>
    .img_area{
        position: relative;
    }
    .del_btn{
        position: absolute;
        top: 0;
        right: 0;

        width: 35px;
        height: 35px;

        transform: translate(50%,-30%);
    }
</style>
@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/product">返回頁面</a>
    <h2>編輯產品</h2>
    <hr>
    <form action="/admin/product/update/{{$product->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-2" for="type_id">類別:</label>
            <select class="form-control col-10" id="type_id" name="type_id" required>
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
        <div class="form-group row">
            <label class="col-2" for="name">名稱:</label>
            <input type="text" class="form-control col-10" id="name" name="name" value="{{$product->name}}" required>
        </div>
        <div class="form-group row">
            <label class="col-2" for="price">價格:</label>
            <input type="number" class="form-control col-10" min="0" id="price" name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-group row">
            <label class="col-2" for="img">目前圖片</label>
            <img src="{{$product->img}}" alt="" width="200">
        </div>
        <div class="form-group row">
            <label class="col-2" for="img">重新上傳圖片:</label>
            <input type="file" class="form-control col-10" id="img" name="img">
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-2" for="img">其他圖片</label>
            {{-- 1.不用關聯的寫法 --}}
            {{-- @foreach ($productImgs as $productImg)
              <img src="{{$productImg->url}}" alt="200">
            @endforeach --}}

            {{-- 2.關聯的寫法 --}}
            <div class="col-10 row">
            @foreach ($product->productImgs as $productImg)
                <div class="img_area m-3">
                    <div class="del_btn btn btn-danger" data-id="{{$productImg->id}}">X</div>
                    <img src="{{$productImg->url}}" alt="" width="200">
                </div>
            @endforeach
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label class="col-2" for="imgs">上傳其他圖片:</label>
            <input type="file" class="form-control col-10" id="imgs" name="imgs[]" multiple>
        </div>

        <div class="form-group row">
            <label class="col-2" for="description">描述:</label>
            <textarea class="form-control col-10" id="description" name="description" rows="3" required>{{$product->description}}</textarea>
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
<script>
    var del_btns= document.querySelectorAll('.del_btn');
    del_btns.forEach(function(del_btn){
        del_btn.onclick=function(){
            var id =this.getAttribute('data-id');
            var _token= document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(id);
            console.log(_token);
            var formData = new FormData();
            formData.append('id',id);
            formData.append('_token',_token);

            fetch('/admin/product/delete_img',{
                method: 'POST',
                body: formData
            })
            
            .then(response =>response.text())//將返回return的內容轉成字串
            .catch(error => console.error('Error:',error))
            .then(response => {
                console.log(response);
                if(response == 'success'){
                this.parentElement.remove();
            }
            });
        }
    });

    //另一個寫法 addEventListener
    // del_btns.forEach(function (del_btn){
    //     del_btn.addEventListener('click',function{

    //     });
    // });

</script>
@endsection