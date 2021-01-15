@extends('layouts.template')
@section('css')
    <style>
        main{
            height: auto;
        }
        .container{
            padding: 100px 0;
        }
        .img{
            background-size: cover;
            background-position: center;
            height: 250px;
        }

    </style>

@endsection
@section('main')
    <div class="container">
        <div class="type_area"></div>
        <div class="product_area row ">
            @foreach ($products as $product)
                <div class="card col-3 my-2">
                    {{-- <img src="{{$product->img}}" class="card-img-top" alt="..."> --}}
                    <div class="card-img-top img" style="background-image: url({{$product->img}});"></div>
                    <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    {{-- <a href="/product/{{$product->id}}" class="btn btn-primary add_cart">加入購物車</a> --}}
                    <a href="#" class="btn btn-primary add_cart" data-id={{$product->id}}>加入購物車</a>
                    </div>
                </div>
            @endforeach
    </div>
@endsection

@section('js')

@endsection
    <script>
        //獲得加入購物車按鈕的元素(element)
        var addCartBtns =document.querySelectorAll('.add_cart')
        //綁定點擊事件
        addCartBtns.forEach(function (addCartBtn){
            addCartBtn.onclick=function(){
                var id =this.getAttribute('data-id');
                var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                var formData = new FormData;
                formData.append('id',id);
                formData.append('_token',_token);

                fetch('/add_cart', {
                    method:'POST',
                    body:formData,
                })
                .then(function (response){
                    return response.text()
                })
                .catch(function (error){
                    console.log('錯誤:',error);
                })
                .then(function(data){
                    console.log('成功:',data);
                });
            };
        });
    </script>
@endsection
