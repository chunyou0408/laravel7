@extends('layouts.00-template')

@section('css')

    <!-- import 03-pasture's CSS -->
    <link rel="stylesheet" href="/css/03-pasture.css">
    <!-- import Bootstrap's CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- import Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('main')
<div class="all">
        <!--Page_Title-->
        <div class="page_title">
            <div class="title_name">Introduction</div>
            <div class="title_underline"></div>
        </div>
        <!-- Content-->
        <section class="camp_area ">
            <div class="camp_area_grass lax" >
                <div></div><img src="./img/03/grass_area.jpg" alt="">
                <div class="grass_text_box">
                    <div class="grass_text_title">草地營位</div>
                    <img class="grass_text_title_underline" src="/img/03/underline.png" alt="">
                    <div class="grass_text_content">
                        <p>草地露營區</p>
                        <p>樟樹林露營區</p>
                </div>
                </div>
            </div>
            <div class="camp_area_wooden lax">
                <img src="./img/03/wooden_area.jpg" alt="">
                <div class="wooden_text_box lax">
                    <div class="wooden_text_title">木板營位</div>
                    <img class="wooden_text_title_underline" src="/img/03/underline.png" alt="">
                    <div class="wooden_text_content">
                        <div class="wooden_text_content_left">
                            <p>枕木林露營區01</p>
                            <p>枕木林露營區02</p>
                            <p>針葉林露營區</p>
                        </div>
                        <div class="wooden_text_content_right">
                            <p>星光露營區</p>
                            <p>松樹林露營區</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="camp_area_tent">
            <div class="tent_text_box lax">
                <div class="tent_text_box_bgcolor lax">
                    <div class="tent_text_title">空中帳篷區</div>
                    <span>鋁高架底座帆布帳篷，</span><br>
                    <span>可宿兩大兩小睡袋需自備。</span>
                </div>
            </div>
            <div class="tent_text_block"></div>

        </section>
        <section class="coffee_area lax">
            <div class="coffee_area_background_color">
                <div class="coffee_area_title">咖啡吧檯</div>
                <img class="coffee_area_title_underline" src="/img/03/underline.png" alt="">
            </div>
            <div class="coffee_img">
                <img class="coffee" src="./img/03/coffee_area.jpg" alt="">
            </div>

            <div class="coffee_area_background_img">
                <img src="./img/03/tree.png" alt="">
            </div>
        </section>
        <div class="segmentation"></div>
        <!-- Photo Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(./img/03/05.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(./img/03/09.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(./img/03/07.jpg)"></div>
                <div class="swiper-slide" style="background-image:url(./img/03/06.jpg)"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
        @endsection
        @section('js')
    <!-- import Bootstrap's JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <!-- import Swiper's JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            //無限輪迴
            loop:true,
            //自動輪播
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            centeredSlides: true,
            slidesPerView: 'auto',
            // clickable:ture,
            coverflowEffect: {
                modifier: 1,
                slideShadows: true,
            },


        });
    </script>

<!-- 草地營位 -->
<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script> -->

<!-- 卷軸 -->
<script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
    <script>
        var tent_text_box = document.querySelector('.tent_text_box');
        var coffee_area = document.querySelector('.coffee_area');
        var scrollheight,a1y,a2y;

        var a1=0,a2=0.3370,b1=0.385,b2=0.50,tt;


            $(window).scroll(function() {

                // scrollheight=document.documentElement.scrollTop;
                scrollheight=document.body.clientHeight;
                tt=tent_text_box.offsetTop;
                a1y=scrollheight*a1;
                a2y=scrollheight*a2;

                b1y=scrollheight*b1;
                b2y=scrollheight*b2;



                console.log(tt+"總長:"+scrollheight+"a1:"+a1y+" a2:"+a2y);
                lax.init()

                // Add a driver that we use to control our animations
                lax.addDriver('scrollY', function () {
                    return window.scrollY
                })

                lax.addElements('.tent_text_box', {
                    scrollY: {
                        opacity: [
                            [a1y, a2y-100],
                            [0, 1]
                        ],
                    }
                })

                lax.addElements('.coffee_area', {
                    scrollY: {
                        opacity: [
                            [b1y, b2y-100],
                            [0, 1]
                        ],
                    }
                })


            });

        window.onload = function () {
            lax.init()

            // Add a driver that we use to control our animations
            lax.addDriver('scrollY', function () {
                return window.scrollY
            })
            // lax.addElements('.wooden_text_box', {
            //     scrollY: {
            //         translateX: [
            //             [0, 300,600,700,900 ],
            //             [-1250, 10,300,800,1500],
            //         ],

            //     }
            // })

            // lax.addElements('.tent_text_box', {
            //     scrollY: {
            //         translateY: [
            //             [500,800],
            //             [500,0],
            //         ],

            //     }
            // })
            // lax.addElements('.tent_text_box_bgcolor', {
            //     scrollY: {
            //         translateX: [
            //             [600,1000],
            //             [1200,0],
            //         ],

            //     }
            // })
            lax.addElements('.tent_text_box', {
                scrollY: {
                    opacity: [
                        [300, 500],
                        [0, 1]
                    ],
                }
            })

            lax.addElements('.coffee_area', {
                scrollY: {
                    opacity: [
                        [850, 1200],
                        [0, 1]
                    ],
                }
            })
        }
    </script>
    @endsection

<!-- 木板營位 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
    <script>
        window.onload = function () {
            lax.init()

            // Add a driver that we use to control our animations
            lax.addDriver('scrollY', function () {
                return window.scrollY
            })

            // Add animation bindings to elements
            lax.addElements('.wooden_text_box', {
                scrollY: {
                    translateX: [
                        [0, 800, 1000, 1500],
                        [-1300, 100, 100, 800],
                    ],
                    rotate: [
                        [200, 500],
                        [0, 360],
                    ],
                    scale: [
                        [1500, 2000],
                        [1, 10]
                    ],
                    opacity: [
                        [1800, 2000],
                        [1, 0]
                    ]
                }
            })
        }
    </script> -->

