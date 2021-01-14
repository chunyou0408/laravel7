@extends('layouts.template')


@section('css')
<style>
    main{
        height: auto;
    }
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: #000;
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
    }

    .gallery-top {
      height: 80%;
      width: 100%;
    }

    .gallery-thumbs {
      height: 20%;
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
    .box{
        width: 50%;
        height: 50vh;
    }
  </style>
@endsection

@section('main')
<div class="box">
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
    
         {{-- <!-- Swiper -->
      <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($product->productImgs as $productImg)
                <div class="swiper-slide">
                    <img src="{{$productImg->url}}" alt="" width="50%"></div>
            @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div> --}}
</div>
 <!-- Swiper -->
 

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