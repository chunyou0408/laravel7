@extends('layouts.00-template')

@section('css')
<link rel="stylesheet" href={{asset("./css/checkout.css")}}>
<style>
  main{
    padding: 50px 0px 0px;
    height: auto;
  }

</style>
@endsection

@section('main')
<h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  @foreach ($carts as $cart)
  <?php $product = App\Product::find($cart->id);?>
  <div class="product">
    <div class="product-image">
      <img src="{{$product->img}}">
    </div>
    <div class="product-details">
      <div class="product-title">{{$product->name}}</div>
      <p class="product-description">{{$product->description}}</p>
    </div>
    {{-- <div class="product-price">{{number_format($product->price)}}</div> --}}
    <div class="product-price" data-price="{{$product->price}}">{{(number_format($product->price))}}</div>
    <div class="product-quantity">
      <input type="number" value="{{$cart->quantity}}" min="1" data-id="{{$cart->id}}">
    </div>
    <div class="product-removal">
      <button class="remove-product" data-id="{{$cart->id}}">
        Remove
      </button>
    </div>
    <div class="product-line-price" data-price="{{$cart->quantity * $product->price}}">{{number_format($cart->quantity * $product->price)}}</div>
  </div>
  @endforeach

  <?php
    $subtotal=\Cart::getSubTotal();
    $tax = $subtotal*0.05;
    $total = $subtotal + $tax;
  ?>
  <div class="totals">
    <div class="totals-item">
      <label>小計</label>
      <div class="totals-value" id="cart-subtotal" data-subtotal="$subtotal">{{number_format($subtotal)}}</div>
    </div>
    <div class="totals-item">
      <label>稅金 (5%)</label>
      <div class="totals-value" id="cart-tax" data-tax="{{$tax}}">{{number_format($tax)}}</div>
    </div>
    <div class="totals-item">
      <label>運費</label>
      <div class="totals-value" id="cart-shipping">0</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>總計</label>
      <div class="totals-value" id="cart-total" data-total="{{$total}}">{{number_format($total)}}</div>
    </div>
  </div>

  <a href="/create_order" class="checkout">Checkout</a>


</div>
@endsection

@section('js')
  {{-- <script src="{{asset("./js/checkout.js")}}"></script> --}}

<script>
/* Set rates + misc */
  var taxRate = 0.05;
  var shippingRate = 0;
  var fadeTime = 300;


  /* Assign actions */
  $('.product-quantity input').change( function() {
    // console.log($(this).attr('data-id'));
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


    // console.log(formData);

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
        // console.log('成功:',data);
    });

    updateQuantity(this);
  });

  $('.product-removal button').click( function() {
    console.log($(this).attr('data-id'));
    //拿到購物車產品ID
    var id =$(this).attr('data-id');
    // var qty =parseInt(this.previousSibling.previousSibling.value);
    var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    //建立表單
    var formData = new FormData;
    //存入資料庫
    formData.append('id',id);
    // formData.append('qty',qty);
    formData.append('_token',_token);

    // console.log(formData);

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
        // console.log('成功:',data);
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
    var tax = subtotal * taxRate;
    var shipping = (subtotal > 0 ? shippingRate : 0);
    var total = subtotal + tax + shipping;

    /* Update totals display */
    $('.totals-value').fadeOut(fadeTime, function() {
      $('#cart-subtotal').html(subtotal.toLocaleString());
      $('#cart-tax').html(tax.toLocaleString());
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
