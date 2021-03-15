@extends('layouts.00-template')

@section('css')
<link rel="stylesheet" href={{secure_asset("./css/checkout.css")}}>
<style>
    main {
        padding: 50px 0px 0px;
        height: auto;
    }
</style>
@endsection

@section('main')
<h1>購物車</h1>

<div class="shopping-cart">
    <div class="column-labels">
        <label class="product-image">圖片</label>
        <label class="product-details">商品</label>
        <label class="product-price">價格</label>
        <label class="product-quantity">數量</label>
        <label class="product-removal">移除</label>
        <label class="product-line-price">金額</label>
    </div>

    @foreach ($carts as $cart)
    <?php $product = App\Product::find($cart->id);?>
    <div class="product">
        <div class="product-image">
            {{-- 顯示照片路徑 --}}
            <img src="{{$product->img}}">
        </div>
        <div class="product-details">
            {{-- 指定超連結到商品內頁,利用ID來指定 --}}
            <a href="/product_detail/{{$product->id}}">
                {{-- 顯示商品名稱路徑 --}}
                <span class="product-title" style="color: black; margin-right: 0px;">{{$product->name}}</span>
            </a>
        </div>
        {{-- 顯示商品價格,因為商品數字會換成100,000的格式,所以將價格塞到data-price方便JS計算 --}}
        <div class="product-price" data-price="{{$product->price}}">{{(number_format($product->price))}}</div>
        <div class="product-quantity">
            {{-- 顯示商品數量 --}}
            <input type="number" value="{{$cart->quantity}}" min="1" data-id="{{$cart->id}}">
        </div>
        {{-- 移除按鈕 --}}
        <div class="product-removal">
            {{-- 移除利用ID找到要移除的產品 --}}
            <button class="remove-product" data-id="{{$cart->id}}">
                移除
            </button>
        </div>
        {{-- 計算產品價格(數量*價格),一樣將價格放入data-price方便js計算 --}}
        <div class="product-line-price" data-price="{{$cart->quantity * $product->price}}">
            {{number_format($cart->quantity * $product->price)}}</div>
    </div>
    @endforeach

    <?php
    // 將購物車的總價格計算出,套件內給的方式
    $subtotal=\Cart::getSubTotal();
    $tax = $subtotal*0.05;
    $total = $subtotal ;
  ?>
    <div class="totals">
        <div class="totals-item">
            <label>小計</label>
            <div class="totals-value" id="cart-subtotal" data-subtotal="$subtotal">{{number_format($subtotal)}}</div>
        </div>
        {{-- <div class="totals-item">
      <label>稅金 (5%)</label>
      <div class="totals-value" id="cart-tax" data-tax="{{$tax}}">{{number_format($tax)}}
    </div>
</div> --}}
<div class="totals-item">
    <label>運費</label>
    <div class="totals-value" id="cart-shipping">0</div>
</div>
<div class="totals-item totals-item-total">
    <label>總計</label>
    <div class="totals-value" id="cart-total" data-total="{{$total}}">{{number_format($total)}}</div>
</div>
<div class="clearfix"></div>
</div>

<hr>
<!--  這個部分是在讓使用者新增寄件資料,按下結帳後會新增訂單 -->
<form action="/create_order" method="post">
    @csrf
    <div class="form-group offset-3 col-6">
        <label for="name">姓名:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group offset-3 col-6">
        <label for="phone">電話:</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group offset-3 col-6">
        <label for="email">信箱:</label>
        <input type="text" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group offset-3 col-6">
        <label for="address">地址:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <button type="submit" class="btn btn-primary checkout">結帳</button>
</form>


</div>
@endsection

@section('js')
{{-- <script src="{{asset("./js/checkout.js")}}"></script> --}}

<script>
    /* Set rates + misc */
  var shippingRate = 0; //運費設定為0元
  var fadeTime = 300; //動畫淡出淡入的時間

  /* Assign actions */
  $('.product-quantity input').change( function() {
    //拿到購物車產品ID
    var id =$(this).attr('data-id');
    var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var qty =$(this).val();

    //建立表單
    var formData = new FormData;
    //存入資料庫
    formData.append('id',id);
    formData.append('_token',_token);
    formData.append('qty',qty);

    //使用fetch,使用post到/update_cart執行
    fetch('/update_cart', {
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
    });

    updateQuantity(this);
  });

  $('.product-removal button').click( function() {
    console.log($(this).attr('data-id'));
    //拿到購物車產品ID
    var id =$(this).attr('data-id');
    var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    //建立表單
    var formData = new FormData;
    //存入資料庫
    formData.append('id',id);
    formData.append('_token',_token);


    fetch('/del_cart', {
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
    });



    removeItem(this);
  });


  /* Recalculate cart */
  function recalculateCart()
  {
    var subtotal = 0;

    /* Sum up row totals */
    $('.product').each(function () {
      subtotal += parseFloat($(this).children('.product-line-price').attr('data-price'));
    });

    /* Calculate totals */
    var shipping = (subtotal > 0 ? shippingRate : 0); //運費0元
    var total = subtotal  + shipping;

    /* Update totals display */
    $('.totals-value').fadeOut(fadeTime, function() {
      $('#cart-subtotal').html(subtotal.toLocaleString());
      $('#cart-shipping').html(shipping.toLocaleString());
      $('#cart-total').html(total.toLocaleString());
      if(total == 0){
        $('.checkout').fadeOut(fadeTime);
      }else{
        $('.checkout').fadeIn(fadeTime);
      }
      $('.totals-value').fadeIn(fadeTime);
    });
  }


  /* Update quantity */
  function updateQuantity(quantityInput)
  {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.product-price').attr('data-price'));
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children('.product-line-price').each(function () {
      $(this).fadeOut(fadeTime, function() {
        $(this).text(linePrice.toLocaleString());
        $(this).attr('data-price',linePrice);
        recalculateCart();
        $(this).fadeIn(fadeTime);
      });
    });
  }


  /* Remove item from cart */
  function removeItem(removeButton)
  {
    /* Remove row from DOM and recalc cart total */
    var productRow = $(removeButton).parent().parent();
    productRow.slideUp(fadeTime, function() {
      productRow.remove();
      recalculateCart();
    });
  }
</script>
@endsection
