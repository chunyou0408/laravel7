@extends('layouts.00-template')


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
        background-size: contain;
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
        height: 50vh;
    }

    .product_name_swiper {
        padding-top: 100px;
        /* width: auto; */
        display: flex;
    }

    .text{
        display: flex;
        flex-direction: column;
    }
    .text h1{
        font-size: 30px;
    }

    .product_name_area {
        margin: auto 0;
    }

    .product_name_text,
    .product_price_text {

    }

    .product_description_text {
        /* border: 1px solid black; */
        padding: 10px 100px;
    }

    .product_description_text h1{
        font-size: 20px;
    }

    .product_description_text p{
        font-size: 18px;
    }

    @media (max-width: 768px) {
        .product_name_swiper{
            display: block;
        }

        .swiper {
        width: 100%;
        }


    }
</style>
@endsection

@section('main')

<div class="container">
    <div class="product_name_swiper">
        <div class="swiper">
            <!-- Swiper -->
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url({{secure_asset($product->img)}})"></div>

                    @foreach ($product->productImgs as $productImg)
                        {{-- @if (file_exists(public_path().$productImg->url)) --}}
                            <div class="swiper-slide" style="background-image:url({{secure_asset($productImg->url)}})"></div>
                        {{-- @endif --}}

                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url({{secure_asset($product->img)}})"></div>
                    @foreach ($product->productImgs as $productImg)
                    {{-- @if (file_exists(public_path().$productImg->url)) --}}
                        <div class="swiper-slide" style="background-image:url({{secure_asset($productImg->url)}})"></div>
                    {{-- @endif --}}
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
        <img src="../img/00/線.png" alt="" width="100%">
        <div class="product_description_text">
            <h1>產品描述:</h1><p>{!!$product->description!!}</p>
        </div>
    </div>
</div>

@endsection

@section('js')
<!-- Initialize Swiper -->
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 3,
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
