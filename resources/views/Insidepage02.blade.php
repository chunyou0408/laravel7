@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        * {
            box-sizing: border-box;
        }

        main {
            height: auto;
        }

        body {
            padding: 0;
            margin: 0;
        }

        .container {
            max-width: 1400px;
            margin: auto;
        }

        .warp {
            padding: 30px 0;
            margin: 0 20px;
        }

        .title {
            margin-bottom: 20px;
            /* line-height: 1em; */
            border-bottom: 1px #c8c8c8 solid;
        }

        .news-row {
            margin-bottom: 20px;

        }

        .warp p {
            margin-top: 0;
            margin-bottom: 18px;

            font-size: 18px;
            line-height: 1.8em;

        }

        .title span {
            margin-right: 10px;
            font-size: 1.125rem;
            line-height: 1.8em;
            display: inline-block;
            vertical-align: top;
        }

        .warp a{
            display: block;
            margin: 10px 0;
            text-decoration: none;
            color: #e06827;
        }

        .warp a span {
            display: inline-block;
            padding: 10px 25px;
            height: 40px;
            border: 1px #000 solid;
            line-height: 1em;
            margin-right: 20px;
            font-size: 1.125rem;
            color: black;
        }

        .warp a:hover {
            color: #e06827;
            text-decoration: underline;
        }

        .warp a:hover span {
            border-color: #db3b00;
            background-color: #db3b00;
            color: #fff;
        }

        .lastupdated {
            margin-bottom: 50px;
            font-size: 1.125rem;
            border-top: 1px solid black;
        }

        .top-page {
            position: absolute;
            left: calc((100% - 130px)/2);
        }

        .warp3 a {
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
            background-color:#1197ca;
        }

        .icon-plurk{
            background-color: #c6602b;
            background-image: url('https://www.taiwan.net.tw/images/icon/shareicon_plurk.svg');
        }
        .icon-plurk:hover {
            background-color:#9c4e25;
        }
        .icon-line{
            background-color: #2cbf13;
            background-image: url('https://www.taiwan.net.tw/images/icon/shareicon_line.svg');
        }
        .icon-line:hover {
            background-color:#2f961d;
        }




    </style>
@endsection

@section('main')
    <div class="container">
        <div class="warp">
            <div class="title">
                <h2>觀光局視各縣市政府執行需求 評估增撥安心旅遊行政費</h2>
                <div class="news-row">
                    <span>發布日期：<span style="color:#db3b00;">2020-12-22</span></span>
                    <span>瀏覽次數：<span style="color:#db3b00;">496</span></span>
                </div>
            </div>
            <p>關於今(21)日台北市旅館商業同業公會質疑中央違反比例原則，安心旅遊補助僅給新臺幣400萬北市府行政費，致審核人力不足，導致安心旅遊補助款核發進度較緩慢一節，交通部觀光局澄清表示，安心旅遊民眾反映熱烈，整體補助筆數較先前之國旅補助高，但大部分縣市仍在觀光局核給之行政費額度辦理核銷作業，就臺北市反映行政費不足之部分，先前已告知會視後續整體預算執行情形，倘有餘裕將再行評估核給。
            </p>
            <p>觀光局表示，安心旅遊補助之金額是依據旅客實際前往旅遊住宿之縣市申請補助費核予補助費，而非以旅館繳納稅之高低為核定之標準，以本次國人旅遊較熱門之前5名之花蓮、臺東、宜蘭、臺中市及高雄市，其安心旅遊補助之金額就較其他縣市高，無關比例原則。另外，在獎助直轄市及縣（市）政府推動安心旅遊自由行旅客住宿優惠實施要點發布時，即已核定臺北市得申請行政費最高為新臺幣400萬元，如實際確有不足，會考量各縣市安心旅遊申請補助筆數再予評估核給。經向臺北市政府瞭解，本次安心旅遊行政費用需求較高係因其委外辦理核銷之單價較其他縣市高出許多，致其行政費用較其他縣市顯得不足，以這次補助筆數較台北市為多之屏東縣及高雄市，其400萬元之行政費仍足以因應核銷之所需。
            </p>
            <p>交通部觀光局表示，已就各縣市安心旅遊補助之執行情形及其實際需求進行整體評估，將視預算情形增撥仍有行政費需求之縣市，亦已請臺北市政府加速辦理其核銷撥款速度，並隨時掌握各縣市核銷之進度，以避免旅館業者資金運用之困境。
            </p>
            <div class="warp2">
                <a href=""><span>上一則</span> 「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</a>
                <a href=""><span>下一則</span> 美豬美牛進口議題專區</a>
                <div class="lastupdated">
                        <div style="padding-top: 5px; float: right;">
                            最後更新時間：
                            <span>2020-12-22</span>
                        </div>
                        <div style="clear:both;"></div>
                        <div>
                        <a class="top-page" href="" title="回列表頁"><span><i class="fas fa-chevron-up"></i>回列表頁</span></a>
                        </div>
                    </div>
                </div>
            </div>

        <div class="warp3">
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
    </div>
@endsection

@section('js')

@endsection
