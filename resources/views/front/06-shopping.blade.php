@extends('layouts.00-template')
{{-- @extends('layouts.app') --}}

@section('css')
    <link rel="stylesheet" href="css/06-shopping.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css">
@endsection


@section('main')
        <section>
            <div class="container">
                <div class="nav">
                    <div class="nav_bg ">
                        <img src="./img/06/野餐-01.jpg" alt="" width="100%">
                    </div>
                </div>
                <div class="shop_title">
                    <samp>SHOP</samp>
                </div>
                <div class="cards row">
                    @foreach ($products as $product)
                    <div class="card col-6 col-md-4 col-lg-3">
                        <a href="/product_detail/{{$product->id}}">
                            <div class="card-img-top">
                                <img src="{{$product->img}}" width="100%" alt="">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">NT${{$product->price}}</p>
                        </div>
                        <div class="card-footer">
                            <div class="button_content">
                                <div class="buy_button">
                                    <div id="buy_button_left" class="buy_button_left hvr-pop">+</div>
                                    <div class="input_area">
                                        <input type="text" class="buy_button_quantity" id="buy_button_quantity"
                                            value="0">
                                    </div>
                                    <div id="buy_button_right" class="buy_button_right hvr-pop">-</div>
                                </div>
                            </div>
                            <div class="confirm">
                                <a href="#" class=" btn btn-primary add_cart" data-id={{$product->id}}>選購</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>



            </div>
        </section>
        @endsection
        @section('js')
        <script>
        console.log('{{Auth::guest()}}');

        'use strict';

        const buy_button = document.querySelectorAll('.buy_button'),
            buy_button_quantity = document.querySelectorAll('.buy_button_quantity'),
            buy_button_right = document.querySelectorAll('.buy_button_right'),
            buy_button_left = document.querySelectorAll('.buy_button_left');

        for (let i = 0; i < buy_button.length; i++) {
            buy_button[i].addEventListener('click', (e) => {

                let target = e.target;

                if (target.classList.contains('buy_button_right')) {

                    if (buy_button_quantity[i].value > 0) {
                        buy_button_quantity[i].value--;
                    }

                } else if (target.classList.contains('buy_button_left')) {
                    buy_button_quantity[i].value++;
                }

            });
        }

        //獲得加入購物車按鈕的元素(element)
        var addCartBtns =document.querySelectorAll('.add_cart')
        //綁定點擊事件
        addCartBtns.forEach(function (addCartBtn){
            addCartBtn.onclick=function(){
                //如果沒有登入狀態,轉址到登入畫面 

                var id =this.getAttribute('data-id');
                // var qty =parseInt(this.previousSibling.previousSibling.value);
                var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var qty =parseInt(this.parentNode.previousSibling.previousSibling.firstChild.nextSibling.firstChild.nextSibling.nextSibling.nextSibling.firstChild.nextSibling.value);

                var formData = new FormData;
                formData.append('id',id);
                formData.append('qty',qty);
                formData.append('_token',_token);

                console.log(formData);

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
                    //回傳的資料
                    if(data == "false"){
                        //fales(代表找不到產品)
                        alert('找不到該項產品');
                    }else{
                        //車子有多少數量的商品
                        $('.shopping_cart .qty').text(data);
                    }
                    console.log('成功:',data);
                });
            }
        });
        </script>

@endsection
