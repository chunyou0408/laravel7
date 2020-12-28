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
                <h2>全台各國家風景區送夕陽、跨年、迎曙光活動</h2>
                <div class="news-row">
                    <span>發布日期：<span style="color:#db3b00;">2020-12-15</span></span>
                    <span>瀏覽次數：<span style="color:#db3b00;">2284</span></span>
                </div>
            </div>
            <p>揮別新冠肺炎陰影，2021年即將到來，你想好要怎麼度過了嗎？台灣各地掀起新希望熱潮，該如何選擇地點歡送最後一道夕陽，共浴新年第一道曙光傳遞新希望。交通部觀光局特別彙整7個國家風景區、各個風光秀麗景點辦理109-110年賞夕陽、跨年及迎曙光活動資訊，規劃迎接2021的到來！讓各處地點參與迎曙光民眾許願望、迎幸福。來台，並配合政府疫情管制措施，完成14天隔離後進行拍攝鐵道旅遊紀錄片。
            </p>
            <p>觀光局表示，全台及離島皆有送舊迎新活動，想歡送2020年最後一道夕陽、揮別疫情的民眾，可選擇到阿里山參加日出印象音樂會，聆聽感恩音樂饗宴，歡送2020年最後一抹夕陽。全台最高的跨年活動〜梨山，除了可以欣賞原住民熱情舞蹈外，並可安排到谷關看晚會、泡溫泉、住飯店，去除冷冽嚴寒迎向晨煦陽光；觀光局也推薦民眾到屏東參加東港鎮跨年晚會，一邊吃東港美食，一邊看表演以及體驗大鵬灣國家風景區潟湖風光美景。
            </p>
            <p>北部民眾也可以選擇搭乘台鐵曙光列車，至東北角福隆海水浴場參加曙光音樂會，民眾可至周邊順遊，包括舊草嶺環狀線自行車逍遙遊，三貂角燈塔步道健行及至靈鷲山進行新春祈福之旅等。
            </p>
            <p>中部民眾可前往日月潭欣賞煙火音樂跨年晚會，在湖光水色霧氣繚繞之間，等待曙光乍現，迎接新年，並有晨曦音樂會及原聲天籟等精彩表演。</p>
            <p>南部民眾可搭台灣好行到阿里山參加「日出印象音樂會」，來自阿里山高山上的天籟演奏，一同展開一場高海拔、高品質、高水準的三高日出印象音樂會。</p>

            <p>東部民眾不妨前往台東三仙台礫灘旁岩石曙光舞台，感受現場表演樂團結合燈光，以不同的節奏、色調創造出不同情境，一同迎接本島第1道幸福曙光。
                至於離島部分，則可選擇到馬祖北竿島上參加升旗典禮，在國家級島嶼與百年古蹟、沙灘美景陪伴下迎新年賞日出，還可參加熱血的健行路跑活動，用健康及微笑開啟你的2021年。</p>

            <p>所有詳細資訊可於台灣觀光資訊網或相關國家風景區管理處網站查詢。觀光局也提醒，因跨年活動適逢連假期間，各項跨年及迎曙光活動皆於半夜清晨之間，道路視線較昏暗，能見度較低，鼓勵民眾多多搭乘公共運輸或接駁車參與各活動，並請事先做好禦寒保暖準備。
            </p>
            <p style="text-align: center;">
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
            </div>

            <div class="warp2">
                <a href=""><span>上一則</span>相信臺灣疫情控制 傾心臺灣鐵道旅遊 英國電視節目來台拍攝臺灣鐵道旅遊專輯</a>
                <a href=""><span>下一則</span>更多詳細內容...</a>
                <div class="lastupdated">
                    <div style="padding-top: 5px; float: right;">
                        最後更新時間：
                        <span>2020-12-24</span>
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

