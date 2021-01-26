@extends('layouts.00-template')
@section('css')
    <link rel="stylesheet" href="./css/07-suggest.css">
@endsection



    @section('main')
        <section>
            <div class="suggest-title">
                <span>SUGGEST</span>
            </div>
            <div class="suggest-box">
                <div class="picture">
                    <img src="./img/07/74.jpg" alt="">
                </div>
                <div class="text-box">
                    <div class="text-top">
                        <div class="text-top-text">
                            <p>
                            您好感謝您拜訪顏氏牧場，如果您有任何疑問，或對我們服務有任何意見建議，歡迎填寫下列表單，我們將會用最快的速度與您聯絡。您也可以透過下列方式跟我們聯絡。謝謝。<br>電話：049-2912041
                        </p>
                            <div class="line"></div>
                        </div>

                    </div>
                    <form class="text-bottom" action="/suggest/store" method="post">
                        @csrf
                        <div class="contact-information">
                            <div class="contact1 contact-box">
                                <ul style="list-style-type:square;"></ul>
                                <li>姓名</li>
                                <input class="input-box" type="text" id="name" name="name" required maxlength="30">
                            </div>
                            <div class="contact2 contact-box">
                                <ul style="list-style-type:square;"></ul>
                                <li>聯絡電話</li>
                                <!-- <input class="input-box" type="text" maxlength="10"> -->
                                <input type="text" class="input-box form-control match-rotation-input" maxlength="10"
                                    onkeyup="value=value.replace(/[^\d]/g,'')" onblur="value=value.replace(/[^\d]/g,'')"
                                    ng-model="schedule.round" id="phone" name="phone" required >
                            </div>
                            <div class="contact3 contact-box">
                                <ul style="list-style-type:square;"></ul>
                                <li>信箱</li>
                                <input class="input-box" type="text" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="suggest_and_button">
                            <div class="suggest">
                                <ul style="list-style-type:square;"></ul>
                                <li>建議與意見</li>
                                <textarea class="suggest-text"  col='30' rows='6' maxlength="500" id="content" name="content" required></textarea>
                            </div>
                            <div class="button">
                                <input class="post-button" type="submit" value="送出">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endsection

        @section('js')
        {{-- <script>
            var  postButton =document.querySelector('.post-button');
            var  name=document.querySelector('#name').value;
            var  phone=document.querySelector('#phone').value;
            var  email=document.querySelector('#email').value;
            var  content=document.querySelector('#content').value;
            postButton.onclick=function(){
            if (name=="" || phone=="" || email=="" || content==""){

            }else{
                alert("已收到您寶貴的建議，謝謝．");
                }
            }


        </script> --}}
        @endsection
