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

        .album-model {
            margin-bottom: 20px;
        }

        .icon-album {
            width: 45px;
            height: 45px;
            display: inline-block;
            vertical-align: top;
            background-image: url('https://www.taiwan.net.tw/images/icon/album.svg');
            background-position: center;
            background-size: cover;
        }

        .album-model h3,
        .icon-album h3 {
            margin: 0;
        }

        .instructionsmenu {
            background-color: #f1f1f1;
            color: #020202;
            padding: 3px 15px;
            margin-bottom: 10px;
            display: inline-block;
            font-size: 1.125rem;
            line-height: 30px;
        }

        .album {
            display: flex;
            width: 100%;
            height: 400px;
        }

        .album a {
            text-decoration: none;
            color: black;
        }

        .album-model ul {
            width: 100%;
            list-style: none;
            padding: 0;

        }

        .album-model ul li {
            width: 33%;
            height: 100%;
            padding: 10px;
        }


        .img {
            width: 100%;
            height: 80%;
            background-color: lightcoral;

            background-position: center;
            background-size: cover;
        }

        .img01 {
            background-image: url('https://www.taiwan.net.tw/att/0030266/02_0030266_1.jpg');
        }

        .img02 {
            background-image: url('https://www.taiwan.net.tw/att/0030266/02_0030266_2.jpg');
        }

        .img03 {
            background-image: url('https://www.taiwan.net.tw/att/0030266/02_0030266.jpg');
        }

        .text {
            /* padding: 10px; */
            /* height: 10%; */
            padding: 10px;
            border: 1px solid black;
        }

        .warp2 a {
            display: block;
            margin: 10px 0;
            text-decoration: none;
            color: #e06827;
        }

        .warp2 a span {
            display: inline-block;
            padding: 10px 25px;
            height: 40px;
            border: 1px #000 solid;
            line-height: 1em;
            margin-right: 20px;
            font-size: 1.125rem;
            color: black;
        }

        .warp2 a:hover {
            color: #e06827;
            text-decoration: underline;
        }

        .warp2 a:hover span {
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
    </style>
@endsection

@section('main')
    <div class="container">
        <div class="warp">
            <div class="title">
                <h2>相信臺灣疫情控制 傾心臺灣鐵道旅遊 英國電視節目來台拍攝臺灣鐵道旅遊專輯</h2>
                <div class="news-row">
                    <span>發布日期：<span style="color:#db3b00;">2020-12-15</span></span>
                    <span>瀏覽次數：<span style="color:#db3b00;">1196</span></span>
                </div>
            </div>
            <p>自全球新冠疫情爆發以來，臺灣因疫情控制良好多次躍登英國主流平面及電視媒體，安全、健康、多元、包容的形象已逐漸於英國民眾心中奠基。英國Channel 5的主題紀錄片節目「世界最美麗的鐵道旅行（World’s
                Most Scenic Railway
                Journeys）」受臺灣多種軌道建設、多樣地理環境及多元文化之吸引，加以對臺灣疫情控制深具信心，在觀光局的協助下，製作單位特別安排攝影小組來台，並配合政府疫情管制措施，完成14天隔離後進行拍攝鐵道旅遊紀錄片。
            </p>
            <p>臺灣是該節目首次拍攝之東亞旅遊目的地。本次拍攝採東部幹線花蓮-臺北段、西部幹線臺北-嘉義段以及阿里山森林火車三軸線，造訪「花蓮」、「太魯閣」、「宜蘭」、「舊草嶺隧道」、「福隆」、「臺北」、「龍騰斷橋」、「阿里山」等據點，除了介紹鐵路機電及工程建設外，同時將呈現鐵道沿線周邊美麗風光、永續旅遊據點、綠色觀光活動，以及部落文化與品茗產業等面向，希望能透過與鐵道相關的人們、故事和歷史，讓英國民眾深入了解臺灣風光與生活文化。
            </p>
            <p>World’s Most Scenic Railway
                Journeys於2020年邁入第3季，為深受全英鐵道迷及深度旅遊愛好者喜愛的鐵道旅遊紀錄片節目，平均每集首播約有150萬人次觀賞。<br>本次交通部觀光局與Channel
                5世界最美麗的鐵道旅行電視節目合作，預定於2021年春季播出。除將於英國國際旅遊市場持續推動臺灣為一主題旅遊目的地意象外，同時宣傳2022鐵道旅遊年行銷主題，有助吸引英國民眾來臺旅遊深度體驗呈現臺灣最新面貌，為臺灣後續開放國境，迎接國際旅客而準備。
            </p>

            <div class="album-model">
                <div style="margin-bottom: 20px;">
                    <div class="icon-album"></div>
                    <h3 style=" display: inline-block;font-size: 1.6rem;">照片</h3>
                </div>
                <div class="keypress-instructions">
                    <a href="" class="instructionsmenu" title="點選顯示操作訊息">點擊檢視本網站使用鍵盤操作相簿說明：</a>
                </div>
                <ul class="album">
                    <li>
                        <a href="">
                            <div class="img01 img"></div>
                            <div class="text">英國Channel 5的紀錄片節目受臺灣多種軌道建設、多樣地理環境及多元文化之吸引，並對臺灣疫情控制深具信心</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img02 img"></div>
                            <div class="text">本次拍攝希望能透過與鐵道相關的人們、故事和歷史，讓英國民眾深入了解臺灣風光與生活文化。</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img03 img"></div>
                            <div class="text">Channel 5「World's Most Scenic Railway Journeys」拍攝團隊與受訪店家合照</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="warp2">
                <a href=""><span>上一則</span>美豬美牛進口議題專區</a>
                <a href=""><span>下一則</span>全台各國家風景區送夕陽、跨年、迎曙光活動</a>
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
    </div>
@endsection

@section('js')

@endsection
