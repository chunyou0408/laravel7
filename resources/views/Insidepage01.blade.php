{{-- 要將內容塞入哪個模板 --}}
@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        * {
            box-sizing: border-box;
        }
        main{
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
        .album a{
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


        .img01,
        .img02 {
            width: 100%;
            height: 80%;
            background-color: lightcoral;

            background-position: center;
            background-size: cover;
        }

        .img01 {
            background-image: url('https://www.taiwan.net.tw/att/0030275/02_0030275.gif');
        }

        .img02 {
            background-image: url('https://www.taiwan.net.tw/att/0030275/02_0030275_1.gif');
        }
        .text{
            /* padding: 10px; */
            /* height: 10%; */
            padding: 10px;
            border: 1px solid black;
        }
        .warp2 a{
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
                <h2>「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</h2>
                <div class="news-row">
                    <span>發布日期：<span style="color:#db3b00;">2020-12-24</span></span>
                    <span>瀏覽次數：<span style="color:#db3b00;">139</span></span>
                </div>
            </div>
            <p>109年「台灣觀巴」優良管理業者、最佳優質路線及最佳服務人員評選結果揭曉。交通部觀光局為提供國內外旅客在臺灣的便利觀光旅遊服務，自93年度起推出「台灣觀巴」套裝旅遊產品，其以優質多元行程與便捷貼心服務，成為台灣旅遊的優質品牌。本年經評選出服務品質優化績優業者前3名、最佳優質路線前10名、服務品質優良獎業者1名及最佳服務人員8名，並於今日假觀光局台北旅遊服務中心舉行頒獎典禮。
            </p>
            <p>觀光局為輔導「台灣觀巴」業者持續提供遊客更優質的服務品質，並檢視推動成效，每年藉由委託第3公正單位辦理服務品質提升暨優化評比作業，選出績優單位與人員予以頒發獎金及獎牌或獎狀，以資獎勵。本(109)年「台灣觀巴」經過專家學者多面向考評與遊客意見調查後，評選出服務品質優化前3名業者分別是屏東旅行社、鄉村旅行社、宏祥旅行社及元帥旅行社(並列)。最佳優質路線共有10條，分別是飛行家旅行社-宜蘭文藝風情豐富行二日遊、屏東旅行社-墾丁海陸體驗線半日遊、鄉村旅行社-澎湖悠閒之旅半日遊、屏東旅行社-恆春半島東海岸線半日遊、金建旅行社-佛光山半日遊、怡容國際旅行社-雪霸國家公園觀霧自然風情二日遊、大確幸旅行社-客家與文青的交流-桃園龍潭一日遊、金建旅行社臺南古都&烏山頭一日遊、元帥旅行社-雲林文化薈萃
                傳統藝術精華一日遊及宏祥旅行社-基隆港、野柳、北海岸半日遊。服務品質優良獎得獎業者為飛行家旅行社。最佳服務人員獎由華府旅行社蕭平；宏祥旅行社宜約瑟、邱健翔、林士懿；屏東旅行社許媄婷、王辰安及漢星旅行社廖堂守等人獲得。
            </p>
            <p>交通部觀光局表示：「台灣觀巴」是觀光局輔導推動的旅遊產品品牌，其以飯店、機場及高臺鐵車站等重要交通節點出發，專人專車接送至國內各主要觀光景點的旅遊服務模式發展迄今已臻成熟，往年國際旅客為主要客源，約占68%。然而在此受全球疫情影響，國境近乎關閉，每年1,700萬出國旅遊人次全留在國內之情形下，危機亦是轉機，「台灣觀巴」當因應後疫情時期轉型，由過去以國際旅客為主的做法，轉為以國旅市場為主，才能增加客源，擴大服務對象。近日將邀集產、官、學各界代表召開「研商輔導『台灣觀巴』轉型作法會議」，共同研議「台灣觀巴」輔導轉型之作法，以有效輔導業者轉型，創新優質品牌形象與價值。未來並將持續就整合行銷及提升服務品質等相關事宜予以協助，期望「台灣觀巴」業者齊心協力，針對國旅市場創新規劃行程內容，共同為「台灣觀巴」的蛻變與精進而努力。「台灣觀巴」行程資訊可至<a href="" style="color:#db3b00 ;text-decoration: none;
                border-bottom: 1px #db3b00 solid;">官網</a>查悉。
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
                            <div class="img01"></div>
                            <div class="text">109年度「台灣觀巴」管理及服務品質優化頒獎典禮</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="img02"></div>
                            <div class="text">交通部觀光局副局長林信任致詞</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="warp2">
            {{-- <a href=""><span>上一則</span> 「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</a> --}}
            <a href=""><span>下一則</span> 觀光局視各縣市政府執行需求 評估增撥安心旅遊行政費</a>
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
    </div>
@endsection

@section('js')

@endsection

