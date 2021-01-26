{{-- 要將內容塞入哪個模板 --}}
@extends('layouts.00-template')


@section('css')
    <link rel="stylesheet" href="./css/01-index.css">
    <!-- import Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <style>
      body{
        /* overflow: hidden; */
      }
      body.active{
        /* overflow: auto; */
      }

    </style>
@endsection

@section('banner')
  <header>
    <div class="above">

            <div class="index_photo">
              <picture>
                <source srcset="./img/01/index_photo375w.jpg"
                media="(max-width:375px)">
                {{-- <img src="./img/01/index_photo.jpg" alt=""> --}}
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
    <section>
        <div class="map-title">
            <span>MAP</span>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24533.3412719521!2d120.91057863607566!3d23.928488706117236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468d7faba4ce5ad%3A0x467f14176c87d2c5!2z6aGP5rCP54mn5aC0!5e0!3m2!1szh-TW!2stw!4v1611478417280!5m2!1szh-TW!2stw" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>

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
    <script>
        var header =document.querySelector('header');

        // window.scrollTo(0, 0);

        // window.onload=ShowHello;
        // function ShowHello(){
        //     console.log('hello');
        //     window.scrollTo(0, 0);
        // }

        //當滾動卷軸時,將全版版面往上捲
      
        $(document).ready(function () {
          console.log("123");
          window.setTimeout(function () {
            $(window).scrollTop(0);
            console.log("123");
          },300);
        });
        window.addEventListener('wheel',function () {
          var body = document.querySelector('body');
          // body.classList.add('active')
          header.classList.add('active')
          

        });
        
    </script>

@endsection

