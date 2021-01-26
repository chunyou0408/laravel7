<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/00-template.css">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/img\00\icon\tree.png" type="image/x-icon"/>

    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">

    <!-- import font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    {{-- swiper CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    {{-- CSS --}}

    {{-- bootstrap CDN --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    @yield('css')
</head>

<body>
    @yield('banner')
    <section class="flex">
        <nav class="nav01">
            <div class="nav_logo_box">
                <a href="/">
                    <div class="logo_area">
                        <img src="../img/00/LOGO.png" alt="">
                    </div>
                    <div class="logo_text">
                        <div class="logo_text_left">
                            <img src="../img/00/logo_pasture_en.png" alt="">
                        </div>
                        <div class="logo_text_right">
                            <img src="../img/00/logo_pasture_zh.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <ul>
                <li class="nav_hover"><a href="/about_us"><span>關於顏氏</span></a>
                </li>
                <li class="nav_hover"><a href="/pasture"><span>牧場介紹</span></a>
                    <div class="line"></div>
                </li>
                <li class="nav_hover news_hover">
                    <a href="/news"><span>最新消息</span>
                        <div class="line"></div>
                    </a>
                    {{-- <div class="news_box">
                        <ul>
                            <li class="nav_hover"><a href=""><span>文字文字</span></a></li>
                            <div class="line"></div>
                            <li class="nav_hover"><a href=""><span>文字文字</span></a></li>
                            <div class="line"></div>
                            <li class="nav_hover"><a href=""><span>文字文字</span></a></li>
                            <div class="line"></div>
                            <li class="nav_hover"><a href=""><span>文字文字</span></a></li>
                        </ul>
                    </div> --}}
                </li>
                <li class="nav_hover"><a href="/camping"><span>場地活動</span>
                        <div class="line"></div>
                    </a></li>
            </ul>

        </nav>
        <nav class="nav02">
            <div class="fold_area">
                <img src="../img/00/bars-solid.svg" alt="" height="100%">
            </div>
            <a href="/">
                <div class="logo_area" style="height: 80px">
                    <img src="../img/00/LOGO.png" alt="" height="80%">
                </div>
            </a>
            <div class="box"></div>
            <ul id="nav02_box">
                <li class="nav_hover"><a href="/about_us"><span>關於顏氏</span></a>
                </li>
                <li class="nav_hover"><a href="/pasture"><span>牧場介紹</span></a>
                </li>
                <li id="nav02_news" class="nav_hover news_hover">
                    <a href="/news"><span>最新消息</span></a>
                </li>
                <li class="nav_hover"><a href="/camping"><span>場地活動</span>
                    </a></li>
                <li class="nav_hover"><a href="/booking"><span>場地預約</span>
                    </a></li>
                <li class="nav_hover"><a href="/shopping"><span>購買商品</span>
                    </a></li>

            </ul>

        </nav>
        <main class="main"  id="main">
            <section>
                <div class="icon_area">
                    <ul class="icon_">
                        <li class="nav-item booking">
                            <a href="/booking"><img class="booking_icon" src="/img/00/icon/booking_icon.png" alt="" width="30px"></a>
                        </li>
                        <li class="nav-item shopping">
                            <a href="/shopping"><img class="shop_icon" src="/img/00/icon/shop_icon.png" alt="" width="35px"></a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a href="/member"><img class="user_icon" src="/img/00/icon/user_icon.png" alt="" width="27px"></a>
                        </li>
                    @else
                    <?php $type = Auth::user()->type;?>
                        @if ($type== 'admin')
                        <li class="nav-item">

                            <a href="/admin">
                                {{-- <i class="fas fa-tools" style="font-size:29px"></i> --}}
                                <img class="tools_icon" src="/img/00/icon/tools_icon.png" alt="" width="29px">
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="admin_icon" src="/img/00/icon/admin_icon.png" alt="" width="35px">{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="user_icon" src="/img/00/icon/user_icon.png" alt="" width="27px">{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif






                    @endguest
                    </ul>
                </div>

            </section>
            <!-- main放這邊 -->
            @yield('main')
            <footer class="footer">
                <div class="footer_container">
                    <div class="footer_decoration">
                        <img src="../img/00/footer_decoration_01.png"  style="height:100px;" alt="" class="decoration_01">
                        <img src="../img/00/footer_decoration_02.png" style="height:70px;" alt="" class="decoration_02">
                        <img src="../img/00/footer_decoration_03.png" style="height:80px;" alt="" class="decoration_03">
                    </div>
                    <div class="footer_left">
                        <ul>
                            <li>牧場/咖啡屋 週六08:00-週日18:00</li>
                            <li>露營區 週五-週日</li>
                            <li>非露營時段入園請來電預約</li>
                            <li>入園最低消費$50 / 可抵消費</li>
                        </ul>
                    </div>
                    <div class="footer_middle">
                        <ul>
                            <li>
                                <i class="fas fa-home"></i>
                                545南投縣埔里鎮水上巷28號
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                049-2912041 / 0937-888102
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                yenfamily1985@yahoo.com.tw
                            </li>
                        </ul>
                    </div>
                    <div class="footer_right">
                        <ul>
                            <li>
                                <div><img src="../img/00/LOGO_white.png" alt="" height="40px"></div>
                                <div><img src="../img/00/顏氏牧場-橫版.png" alt="" width="90%"></div>
                            </li>
                            <li>
                                <a href="https://zh-tw.facebook.com/Yenpasture/"><i class="fab fa-facebook-square"></i></a>
                                <a href="https://www.instagram.com/yenpasture2/?hl=zh-tw"><i class="fab fa-instagram"></i></a>
                                <a href="/suggest"><i class="far fa-comment-dots"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>


            </footer>
            <div style="clear: both;"></div>


        </main>
    </section>



    <!-- Scripts -->
    {{-- <script src="{{ secure_asset('js/app.js') }}"></script> --}}
    <script src="{{ secure_asset('js/app.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}

    {{-- swiper --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    {{-- bootstrap --}}





    <!-- js -->
    <script>
        var main =document.querySelector('.main');
        var footer_decoration =document.querySelector('.footer_decoration');
        var footer =document.querySelector('.footer');



        var booking_icon = document.querySelector('.booking_icon');
        var shop_icon = document.querySelector('.shop_icon');
        var user_icon = document.querySelector('.user_icon');
        var tools_icon = document.querySelector('.tools_icon');
        var admin_icon = document.querySelector('.admin_icon');
        var fold_area = document.querySelector('.fold_area');
        var nav02_box = document.querySelector('#nav02_box');
        var nav02_news = document.querySelector('#nav02_news');
        var nav02_news_box = document.querySelector('#nav02_news_box');

        fold_area.onclick = function () {

            if (!fold_area.classList.contains('active')) {
                fold_area.classList.add('active')
                nav02_box.classList.add('active')
                main.classList.add('active')
                footer_decoration.classList.add('active')
                footer.classList.add('active')

            } else {
                fold_area.classList.remove('active')
                nav02_box.classList.remove('active')
                main.classList.remove('active')
                footer_decoration.classList.remove('active')
                footer.classList.remove('active')
            }
        }

        nav02_news.onclick = function () {
            if (!nav02_news.classList.contains('active')) {

                nav02_news.classList.add('active')
                nav02_news_box.classList.add('active')
            } else {
                nav02_news.classList.remove('active')
                nav02_news_box.classList.remove('active')
            }
        }


        booking_icon.onmouseover = function () {
            booking_icon.src = '/img/00/icon/booking_icon_hover.png';
        }
        booking_icon.onmouseout = function () {
            booking_icon.src = '/img/00/icon/booking_icon.png';
        }

        shop_icon.onmouseover = function () {
            shop_icon.src = '/img/00/icon/shop_icon_hover.png';
        }
        shop_icon.onmouseout = function () {
            shop_icon.src = '/img/00/icon/shop_icon.png';
        }

        if(user_icon != null){
            user_icon.onmouseover = function () {
                user_icon.src = '/img/00/icon/user_icon_hover.png';
            }
            user_icon.onmouseout = function () {
                user_icon.src = '/img/00/icon/user_icon.png';
            }
        }

        if(tools_icon != null){
            tools_icon.onmouseover = function () {
                tools_icon.src = '/img/00/icon/tools_icon_hover.png';
            }
            tools_icon.onmouseout = function () {
                tools_icon.src = '/img/00/icon/tools_icon.png';
            }
        }
        if(admin_icon != null){
            admin_icon.onmouseover = function () {
                admin_icon.src = '/img/00/icon/admin_icon_hover.png';
            }
            admin_icon.onmouseout = function () {
                admin_icon.src = '/img/00/icon/admin_icon.png';
            }
        }




        //偵測畫面寬度
        // $(document).ready(function(){
        //     $(window).resize(function() {
        //         console.log(document.body.clientWidth);
        //     });
        // });
    </script>

    {{-- JS --}}
    @yield('js')
</body>

</html>
