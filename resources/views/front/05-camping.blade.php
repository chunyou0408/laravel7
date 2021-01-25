@extends('layouts.00-template')
    <!-- 因為使用sass所以要先link程式碼 -->
    @section('css')
    <link rel="stylesheet" href="./css/05-camping.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @endsection


    @section('main')
        <!-- section-之後套模板統一模式 -->
        <section>
            <div class="camping-title">
                <span>CAMPING</span>
            </div>
            <!-- 露營照片區塊 -->
            <div class="camping-photo-card">
                <!--  -->
                <!-- 照片1-3 -->
                <div class="pt-box pt-box1">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/01.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                            data-aos-anchor-placement="bottom-bottom"
                            data-aos-offset="50"
                           >
                            <div>草原露營區</div>
                            <div class="set-show-768">50set</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line" src="./img/05/underline.png" alt="">
                        <span>50 set</span>
                    </div>
                </div>
                <div class="pt-box pt-box2">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/02.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                            data-aos-anchor-placement="bottom-bottom"
                            data-aos-offset="50">
                            <div>樟樹林露營區</div>
                            <div class="set-show-768">8set</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line" src="./img/05/underline.png" alt="">
                        <span>8 set</span>
                    </div>
                </div>
                <div class="pt-box pt-box3">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/03.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                            data-aos-anchor-placement="bottom-bottom">
                            <div>枕木露營區</div>
                            <div class="set-show-768">7set</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line" src="./img/05/underline.png" alt="">
                        <span>7 set</span>
                    </div>
                </div>
                <!-- 照片4-6 -->
                <div class="pt-box pt-box4">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/04.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                            data-aos-anchor-placement="bottom-bottom">
                            <div>枕木露營區2</div>
                            <div class="set-show-768">7set</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line" src="./img/05/underline.png" alt="">
                        <span>7 set</span>
                    </div>
                </div>
                <div class="pt-box pt-box5">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/05.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                            data-aos-anchor-placement="bottom-bottom">
                            <!-- data-aos="fade-down" data-aos-delay:3000; -->
                            <div> 針葉林露營區</div>
                            <div class="set-show-768">27set</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line" src="./img/05/underline.png" alt="">
                        <span>27 set</span>
                    </div>
                </div>
                <div class="pt-box pt-box6">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/06.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                            data-aos-anchor-placement="bottom-bottom">
                            <!-- data-aos="fade-down" data-aos-delay:3000; -->
                            <div> 星光露營區</div>
                            <div class="set-show-768">17set</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line" src="./img/05/underline.png" alt="">
                        <span>17 set</span>
                    </div>
                </div>
                <!-- 照片7-8 -->
                <div class="pt-box pt-box7">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/07.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                            data-aos-anchor-placement="bottom-bottom">
                            <!-- data-aos="fade-down" data-aos-delay:3000; -->
                            <div>松樹林露營區</div>
                            <div class="set-show-768">10set</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line" src="./img/05/underline.png" alt="">
                        <span>10 set</span>
                    </div>
                </div>
                <div class="pt-box pt-box8">
                    <!-- 圖片hover過去的效果 -->
                    <div class="img-hover">
                        <img src="./img/05/08.jpg" alt="">
                        <div class="pt-box-img-text fade-effect" data-aos="flip-down" data-aos-delay="1500"
                        data-aos-anchor-placement="bottom-bottom">
                            <div>空中帳篷區</div>
                            <div class="set-show-768">致電預約</div>
                        </div>
                    </div>
                    <div class="pt-box-text">
                        <img class="text-line-8" src="./img/05/underline.png" alt="">
                        <div>致電預約</div>
                    </div>
                </div>
                <!-- 露營注意事項、預約等文字 -->
                <div class="camping-introduction-box">
                    <div class="camping-notes-box" data-aos="fade-right" data-aos-delay="500">
                        <div class="camping-notes-title">露營注意事項</div>
                        <div class="line"></div>
                        <!-- 露營注意文字區塊 -->
                        <div class="camping-notes-text">
                            <p>
                                一. 垃圾菸蒂請勿落地，勿施放煙火。
                                <br>
                                二. 請勿在地面生火，烤肉請自備爐具。
                                <br>
                                三. 各營區有數個插座供共同使用，請自備延長線。
                                <br>
                                四.
                                汽車均可停於營位附近。
                                <br>
                                五. 請保持營區寧靜，下午一點前離營。
                                <br>
                            </p>
                        </div>
                    </div>
                    <div class="camping-price" data-aos="fade-left" data-aos-delay="500">
                        <div class="camping-price-title">露營收費</div>
                        <div class="line"></div>
                        <!-- 露營收費文字區塊 -->
                        <div class="camping-price-text">
                            <p>
                                    空帳收費&emsp;&emsp;&nbsp;&nbsp;&nbsp;$1300/帳
                                    <br>
                                    地帳收費&emsp;&emsp;&nbsp;&nbsp;&nbsp;$800/帳
                                    <br>
                                    <br>
                                    可進場2位人3小孩或3位大人，
                                    每多1位大人$250小孩$100
                                </p>
                        </div>
                    </div>
                    <div class="camping-reservation" data-aos="zoom-in" data-aos-delay="500">
                        <div class="camping-reservation-title">露營預約</div>
                        <div class="line"></div>
                        <div class="camping-reservation-text">
                            <p>
                                牧場採線上預約，露營日期前一個月開放預約，您必須提前12小時預約，並且于收到預約確認信後完成預約。
                                <br>
                                <br>
                                若您因故無法前來，請事先上網取消預約，當日取消需來電告知工作人員，以免影響他人權益。多次無故取消且未事先通知者，牧場有權利取消其預約。
                                <br>
                                <br>
                                遇事件或活動，顏氏牧場可能停止或僅開放部分露營區。
                                <br>
                            </p>
                        </div>

                            <div class="reservation-btn">
                                <a href="/booking">
                                    我要預約
                                </a>
                            </div>

                    </div>
                </div>
        </section>
        @endsection
        @section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        var fade_img = $('.fade-effect');



        //偵測畫面寬度

        $(window).resize(function () {
            if ($(window).width() < 541) {
                console.log('321');
                fade_img.attr('data-aos', 'flip-down');
                fade_img.attr('data-aos-delay', '1500');
                fade_img.attr('data-aos-anchor-placement', 'bottom-bottom');
                // fade_img.attr('data-aos-offset','50');
            } else {
                fade_img.removeAttr('data-aos');
                fade_img.removeAttr('data-aos-delay');
                fade_img.removeAttr('data-aos-anchor-placement');
                // fade_img.removeAttr('data-aos-offset');

            }
        });

         // 一開始的畫面也要設置條件
         $(document).ready(function () {
            if ($(window).width() < 541) {
                console.log('123');
                fade_img.attr('data-aos', 'flip-down');
                fade_img.attr('data-aos-delay', '1500');
                fade_img.attr('data-aos-anchor-placement', 'bottom-bottom');
                // fade_img.attr('data-aos-offset','50');
            } else {
                fade_img.removeAttr('data-aos');
                fade_img.removeAttr('data-aos-delay');
                fade_img.removeAttr('data-aos-anchor-placement');
                // fade_img.removeAttr('data-aos-offset');
            }
        });



    </script>
@endsection
