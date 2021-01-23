{{-- 要將內容塞入哪個模板 --}}
@extends('layouts.00-template')


@section('css')
    <link rel="stylesheet" href="./css/01-index.css">
    <!-- import Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">

@endsection

@section('banner')
  <header>
    <div class="above">

            <div class="index_photo">
              <picture>
                <source srcset="./img/01/index_photo375w.jpg"
                media="(max-width:375px)">
                <img src="./img/01/index_photo.jpg" alt="">
              </picture>
            </div>
            <div class="logo">
                <img src="./img/01/logo.png" alt="" width="100%">
            </div>
            <div class="logo_horizontal">
                <img src="./img/01/logo_horizontal.png" alt="" width="100%">
            </div>
            <div class="logo_horizontal_en">
                <img src="./img/01/logo_horizontal_en.png" alt="" width="100%">
            </div>
            <div class="text">SCROLL DOWN<i class="fas fa-chevron-down"></i></div>

        </div>
  </header>
 @endsection

  @section('main')

    <div class="below">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide" ><img src="./img/01/grassland.jpg" alt="" width="100%"></div>
          <div class="swiper-slide" ><img src="./img/01/tent.jpg" alt="" width="100%"></div>
          <div class="swiper-slide" ><img src="./img/01/coffee_shop.jpg" alt="" width="100%"></div>
          <div class="swiper-slide" ><img src="./img/01/night.jpg" alt="" width="100%"></div>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

      </div>

    </div>
  @endsection

  @section('js')
    <!-- import Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>

    <script>
      var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        effect: 'fade',
        speed:2000,

        fadeEffect: {
        crossFade: true,
        },

        fade:{
          crossFade:true,
        },

        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
@endsection

