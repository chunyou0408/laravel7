<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    {{-- swiper CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        nav {
            height: 74px;
            width: 100%;
            background-color: #f0f0f0;
        }

        a {
            text-decoration: none;
        }

        ul {
            list-style: none;
            padding: 0 10px;
            margin: 0;

            display: flex;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        li {
            margin-right: 10px;
        }

        main {
            width: 100%;
            height: 70vh;
        }


        .left-side {
            float: left;
        }

        .right-side {
            float: right;
            display: flex;
        }

        .right-side ul{
        margin-top: 18px;
        }
        .right-side li a {
            padding: 0px 20px;
            border-right: 1px #c9c9c9 solid;
            color: black;
        }

        .right-side li a:hover {
            color: #db3b00;
        }
        .link-item{
            width: 38px;
            height: 38px;
            background-repeat: no-repeat;
            background-position: center;
            text-indent: -9999px;
            margin: 0px 4px;
            color: #000;

        }


        .facebook {
            background-size: contain;
            background-image: url('https://www.taiwan.net.tw/images/icon/facebook.svg');
        }

        .facebook:hover {
            background-image: url('https://www.taiwan.net.tw/images/icon/facebook_active.svg');
        }
        .line{
            background-size: 80%;
            background-image: url('https://www.taiwan.net.tw/images/icon/line.svg');
        }

        .line:hover {
            background-image: url('https://www.taiwan.net.tw/images/icon/line_active.svg');
        }

        .youtube{
            background-size: 70%;
            background-image: url('https://www.taiwan.net.tw/images/icon/youtube.svg');
        }

        .youtube:hover {
            background-image: url('https://www.taiwan.net.tw/images/icon/youtube_active.svg');
        }



        .logo {
            width: 110px;
            height: 40px;
            position: relative;
        }

        .logo a {
            width: 100%;
            height: 100%;
            display: block;
            position: absolute;
            top: 0px;
            left: 0px;
            background: url('https://www.taiwan.net.tw/images/logo.png') no-repeat center/contain;
            text-indent: -9999px;
            color: #000;
        }

        .div_debug ,.navbar {
            max-width: 1400px;
            margin: auto;
        }

        .div_debug a {
            display: block;
            padding: 10px 20px;
            float: right;
            text-align: center;
            background-color: #f1f1f1;
            color: #c53e00;
        }

        .share-link-item {
            display: flex;
            width: 100%;
            height: auto;
            padding: 30px 0;
            margin: 0;

            list-style: none;
            justify-content: center;
        }

        .icon {
            border-radius: 100%;
            width: 60px;
            height: 60px;
            background-position: center;
            background-size: contain;
        }

        .icon-fb {
            background-color: #3b5998;
            background-image: url('https://www.taiwan.net.tw/images/icon/shareicon_facebook.svg');
            color: #fff;
        }

        .icon-fb:hover {
            background-color: #2a4173;
        }

        .icon-tw {
            background-color: #00aced;
            background-image: url('https://www.taiwan.net.tw/images/icon/shareicon_twitter.svg');
        }

        .icon-tw:hover {
            background-color: #1197ca;
        }

        .icon-plurk {
            background-color: #c6602b;
            background-image: url('https://www.taiwan.net.tw/images/icon/shareicon_plurk.svg');
        }

        .icon-plurk:hover {
            background-color: #9c4e25;
        }

        .icon-line {
            background-color: #2cbf13;
            background-image: url('https://www.taiwan.net.tw/images/icon/shareicon_line.svg');
        }

        .icon-line:hover {
            background-color: #2f961d;
        }
        .shopping_cart{
            width: 80px;
            color: black;
            font-size: 48px;
            position: fixed;
            right: 40px;
            bottom: 30vh;
        }
        .shopping_cart img {
            display: block;
        }
        .shopping_cart:hover img:first-child {
            display: none;
        }

        .shopping_cart img:nth-child(2) {
            display: none;
        }
        .shopping_cart:hover img:nth-child(2) {
            display: block;
        }

        .shopping_cart .qty{
            position: absolute;
            color: #000;
            width:35px;
            height: 35px;
            border: 1px solid #000;
            border-radius: 50%;
            background: #FFF;
            font-size: 16px;
            top:0;
            right: 0;
            transform: translate(40%,-40%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer {
            height: 300px;
            width: 100%;
            background-color: #f0f0f0;
        }
    </style>
    {{-- CSS --}}
    @yield('css')
</head>

<body>
    <!-- <nav>
        <ul>
            <li><a href="/news">最新消息</a></li>
            <li><a href="/news/no001">第一篇文章</a></li>
            <li><a href="/news/no002">第二篇文章</a></li>
            <li><a href="/news/no003">第三篇文章</a></li>
            <li><a href="/news/no004">第四篇文章</a></li>
        </ul>
    </nav> -->

    <nav style="ffff">
        <div class="navbar">
            <div class="left-side">
                <h2 class="logo">
                    <a title="交通部觀光局" href="/news">交通部觀光局</a>
                </h2>
            </div>
            <div class="right-side">
                <a href="" style="line-height: 74px;">:::</a>
                <ul>
                    <li><a href="">網站導覽</a></li>
                    <li><a href="">聯絡我們</a></li>
                    <li><a href="">行政資訊網</a></li>
                    <li><a href="">兒童網</a></li>
                    <li><a href="">回首頁</a></li>
                    <a href="" class="link-item facebook"></a>
                    <a href="" class="link-item line"></a>
                    <a href="" class="link-item youtube"></a>
                    <a href="" style="color: black;">Language</a>

                </ul>
            </div>
        </div>
    </nav>

    <main>
        <!-- 放內文 -->
        <div id="app"></div>
        @yield('main')
        <div class="shopping_cart">
            <a href="/checkout">
            <?php
            $getTotalQty=\Cart::getTotalQuantity();
            ?>
                <i class="shopping_cart">
                    <img src="{{asset("./storage/jpg/maxresdefault-removebg-preview.png")}}" alt="" width="100%">
                    <img src="{{asset("./storage/jpg/cart2.png")}}" alt="" width="100%">
                    <div class="qty">{{$getTotalQty}}</div>
                </i>
            </a>
        </div>
    </main>
    <div class="div_debug">
        <a href="" title="網站除錯報馬仔">網站除錯報馬仔</a>
        <div style="clear:both;"></div>
    </div>
    <ul class="share-link-item">
        <li>
            <div class="icon-fb icon"></div>
        </li>
        <li>
            <div class="icon-tw icon"></div>
        </li>
        <li>
            <div class="icon-plurk icon"></div>
        </li>
        <li>
            <div class="icon-line icon"></div>
        </li>
    </ul>
    <footer>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- swiper --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    {{-- JS --}}
    @yield('js')
</body>

</html>
