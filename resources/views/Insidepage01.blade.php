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
            height: 800px;
            flex-wrap: wrap;
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
            width: 32.598%;
            height: 50%;
            padding: 10px;
        }


        .img{
            width: 100%;
            height: 80%;
            background-color: lightcoral;

            background-position: center;
            background-size: cover;
        }

        .img01 {
            background-image: url('https://www.taiwan.net.tw/att/0030265/02_0030265.jpg');
        }

        .img02 {
            background-image: url('https://www.taiwan.net.tw/att/0030265/02_0030265_1.jpg');
        }

        .img03 {
            background-image: url('https://www.taiwan.net.tw/att/0030265/02_0030265_2.jpg');
        }

        .img04 {
            background-image: url('https://www.taiwan.net.tw/att/0030265/02_0030265_3.jpg');
        }

        .img05 {
            background-image: url('https://www.taiwan.net.tw/att/0030265/02_0030265_4.jpg');
        }

        .img06 {
            background-image: url('https://www.taiwan.net.tw/att/0030265/02_0030265_5.jpg');
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
                <h2>2021台灣燈會主燈動土　「乘風逐光」為台灣祈福</h2>
                <div class="news-row">
                    <span>發布日期：<span style="color:#db3b00;">2020-12-25</span></span>
                    <span>瀏覽次數：<span style="color:#db3b00;">275</span></span>
                </div>
            </div>
            <p>2021台灣燈會「乘夢逐光．未來風」主燈「乘風逐光」於今(25)日正式在新竹錦華公園進行動土儀式。由交通部觀光局張錫聰局長和新竹市政府陳章賢秘書長共同主持，祈求工程圓滿順利。
            </p>
            <p>本次主燈結合燈光、工藝及傳統竹藝等特色，完成後將兼具高科技、未來感及傳統燈節等多元意象，有別於以往主燈形象！主燈設計更連結新竹在地產業與傳統竹藝，將108根竹子、風城特色、工藝科技等元素結合，透過機械動力呈現出風一般的律動，且能變化出各種傳統燈籠造型，讓參觀者親身體驗燈光科技的光影魅力，見證傳統民俗與科技的結合，藉由主燈所帶來的感動，對台灣未來心生無限美好的感動與祝福。
            </p>
            <p>2021台灣燈會共有三大主軸特色，分別結合設計與工藝、傳統與創意兼具，以及透過藝術和國際對話，展現燈會2.1的概念，並以雙主燈、六大燈區等豐富展示區域，展現各式傳統與科技結合的燈光藝術，為往年傳統元宵節慶，帶來創新能量！
            </p>
            <p>目前疫情尚未舒緩，有關民眾關心的大型群聚活動，及交通管制疏運措施，新竹市政府依最新疫情現況滾動調整中。觀光局已補助新竹市府相關經費辦理疏運規劃及防疫應變計畫，未來也將全力配合，依市府所提的交通管制、疏運措施並予以協助。歡迎全國民眾前往參加，體驗這場光與科技結合的全新燈會，在傳統節慶的幸福氛圍下，祈福台灣美好未來，漫步在燈區藝術中，享受一場光彩絢麗的燦爛燈會！
            </p>
            {{-- <p style="text-align: center;">
                <img src="https://www.taiwan.net.tw/userfiles/image/2021photo/13222958637358.jpg" alt="" width="70%">
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
                            <div class="text">三仙台迎曙光</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img02 img"></div>
                            <div class="text">三仙台美景</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img03 img"></div>
                            <div class="text">阿里山日出</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img04 img"></div>
                            <div class="text">阿里山日出印象音樂會</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img05 img"></div>
                            <div class="text">福隆迎曙光</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img06 img"></div>
                            <div class="text">福隆迎曙光人潮</div>
                        </a>
                    </li>
                </ul>
            </div> --}}

            <div class="warp2">
                {{-- <a href=""><span>上一則</span>相信臺灣疫情控制 傾心臺灣鐵道旅遊 英國電視節目來台拍攝臺灣鐵道旅遊專輯</a> --}}
                <a href=""><span>下一則</span>「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</a>
                <div class="lastupdated">
                    <div style="padding-top: 5px; float: right;">
                        最後更新時間：
                        <span>2020-12-25</span>
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

