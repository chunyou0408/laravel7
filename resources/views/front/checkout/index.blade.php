@extends('layouts.template')

@section('css')
<link rel="stylesheet" href={{asset("./css/checkout.css")}}>
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
    <div class="product-price">{{($product->price)}}</div>
    <div class="product-quantity">
      <input type="number" value="{{$cart->quantity}}" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">{{$cart->quantity * $product->price}}</div>
  </div>
  @endforeach

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">71.97</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>

  <a href="/create_order" class="checkout">Checkout</a>


</div>
@endsection

@section('js')
    <script src="{{asset("./js/checkout.js")}}"></script>
@endsection