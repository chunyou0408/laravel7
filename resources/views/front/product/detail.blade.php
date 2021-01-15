@extends('layouts.template')


@section('css')
<style>
    main {
        height: auto;
    }

    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper-container {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .gallery-top {
        height: 75%;
        width: 100%;
    }

    .gallery-thumbs {
        height: 25%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .gallery-thumbs .swiper-slide {
        height: 100%;
        opacity: 0.4;
    }

    .gallery-thumbs .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper {
        width: 40%;
        height: 60vh;
    }

    .product_name_swiper {
        display: flex;
    }

    .text{
        display: flex;
        flex-direction: column;


    }

    .product_name_area {
        margin: auto 0;
    }

    .product_name_text,
    .product_price_text {}

    .product_description_text {
        border: 1px solid black;
        padding: 10px 100px;
    }
    .product_description_text h1{

    }
</style>
@endsection

@section('main')


<div class="product_name_swiper">
    <div class="swiper">
        <!-- Swiper -->
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                @foreach ($product->productImgs as $productImg)
                <div class="swiper-slide" style="background-image:url({{$productImg->url}})"></div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                @foreach ($product->productImgs as $productImg)
                <div class="swiper-slide" style="background-image:url({{$productImg->url}})"></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="product_name_area">
        <div class="text">
            <div class="product_name_text">
                <h1>商品名稱:{{$product->name}}</h1>
            </div>
            <div class="product_price_text">
                <h1>價格:{{$product->price}}元</h1>
            </div>
        </div>
    </div>
</div>
<div class="product_description_area">
    <div class="product_description_text">
        <h1>產品描述:</h1><h3>{{$product->description}}</h3>
    </div>
</div>


@endsection

@section('js')
<!-- Initialize Swiper -->
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
</script>
@endsection