{{-- 要將內容塞入哪個模板 --}}
@extends('layouts.template')

{{-- 要連入CSS區塊的東西 --}}
@section('css')
<style>
    main{
        height: auto;
    }

    body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    h1{
        margin: 20px 0;
        text-align: center;
    }
    .title_box{
        border-bottom: 1px solid #000;
    }
    .title-icon{
        width: 75px;
        display: block;
        margin: 0px auto 10px;
        overflow: hidden;
        pointer-events: none;
    }
    .card a:hover{
        color:#db3b00;
    }
    .card {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: row;
        padding: 40px 20px;
        border-bottom: 1px solid #000;

    }
    .img{
        width: 36%;
        max-height: 320px;
        min-height: 220px;
        height: 16vw;
        background-color:lightgray;
    }
    .img img{
        height: 100%;
        width: 100%;
    }
    .container{
        max-width: 1140px;
        width: 80%;
        margin: auto;

        padding-bottom: 30px
    }
    .content{
        width: 64%;
        padding-left: 30px;
    }
    .news_box{
        background-color: #a44cc4;
        color: #fff;
        border-color: #a44cc4;
        line-height: 30px;
        display: inline-block;
        vertical-align: top;
        margin-right: 5px;
        margin-bottom: 5px;
        border: 1px #c9c9c9 solid;
        padding: 3px 20px;
        font-size: 1.06rem;
    }
    .title{
        font-size: 24px;
        font-weight: bold;
        padding: 10px 0;
    }
    .date{
        font-style: 20px;
        color: red;
        padding: 10px 0;
    }
    .text{
        font-size: 18px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        margin: 10px 0;
    }
</style>
@endsection



@section('main')
        <div class="container">
            <div class="title_box">
                <div class="title-icon"><img src="https://www.taiwan.net.tw/att/topTitleImg/21_0001001.svg" alt=""></div>
                <h1>最新消息</h1>
            </div>

            {{-- 1. --}}
            {{-- @foreach ($news_data as $news)
            <div class="card">
                <div class="img"><img src="{{$news->img}}" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                    <a href="{{$news->img}}"><div class="title">{{$news->title}}</div></a>
                    <div class="date">{{$news->date}}</div>
                    <div class="text">{{$news->content}}</div>
                </div>
            </div>
            @endforeach --}}

            {{-- 2. --}}
            @foreach ($newsData as $news)
            <div class="card">
                <div class="img"><img src="{{$news->img}}" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                    <a href="{{$news->img}}"><div class="title">{{$news->title}}</div></a>
                    <div class="date">{{$news->date}}</div>
                    <div class="text">{!!$news->content!!}</div>
                </div>
            </div>
            @endforeach

            {{-- <div class="card">
                <div class="img"><img src="https://www.taiwan.net.tw/pic.ashx?qp=/0030279/13_0030279.jpg&sizetype=2" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                    <a href="/news_detail_01"><div class="title">2021台灣燈會主燈動土　「乘風逐光」為台灣祈福</div></a>
                    <div class="date">2020-12-25</div>
                    <div class="text">2021台灣燈會「乘夢逐光．未來風」主燈「乘風逐光」於今(25)日正式在新竹錦華公園進行動土儀式。由交通部觀光局張錫聰局長和新竹市政府陳章賢秘書長共同主持，祈求工程圓滿順利。
                    本次主燈結合燈光、工藝及傳統竹藝等特色，完成後將兼具高科技、未來感及傳統燈節等多元意象，有別於以往主燈形象！主燈設計更連結新竹在地產業與傳統竹藝，將108根竹子、風城特色、工藝科技等元素結合，透過機械動力呈現出風一般的律動，且能變化出各種傳統燈籠造型，讓參觀者親身體驗燈光科技的光影魅力，見證傳統民俗與科技的結合，藉由主燈所帶來的感動，對台灣未來心生無限美好的感動與祝福。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"><img src="https://www.taiwan.net.tw/pic.ashx?qp=/0030275/13_0030275_1.jpg&sizetype=2" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                    <a href="/news_detail_02"><div class="title">「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</div></a>
                    <div class="date">2020-12-24</div>
                    <div class="text">109年「台灣觀巴」優良管理業者、最佳優質路線及最佳服務人員評選結果揭曉。交通部觀光局為提供國內外旅客在臺灣的便利觀光旅遊服務，自93年度起推出「台灣觀巴」套裝旅遊產品，其以優質多元行程與便捷貼心服務，成為台灣旅遊的優質品牌。本年經評選出服務品質優化績優業者前3名、最佳優質路線前10名、服務品質優良獎業者1名及最佳服務人員8名，並於今日假觀光局台北旅遊服務中心舉行頒獎典禮。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"><img src="https://www.taiwan.net.tw/pic.ashx?qp=/0030269/13_0030269.jpg&sizetype=2" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                    <a href="/news_detail_03"><div class="title">觀光局視各縣市政府執行需求 評估增撥安心旅遊行政費</div></a>
                    <div class="date">2020-12-22</div>
                    <div class="text">關於今(21)日台北市旅館商業同業公會質疑中央違反比例原則，安心旅遊補助僅給新臺幣400萬北市府行政費，致審核人力不足，導致安心旅遊補助款核發進度較緩慢一節，交通部觀光局澄清表示，安心旅遊民眾反映熱烈，整體補助筆數較先前之國旅補助高，但大部分縣市仍在觀光局核給之行政費額度辦理核銷作業，就臺北市反映行政費不足之部分，先前已告知會視後續整體預算執行情形，倘有餘裕將再行評估核給。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"><img src="https://www.taiwan.net.tw/pic.ashx?qp=/0030266/02_0030266_1.jpg&sizetype=2" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                   <a href="/news_detail_04"><div class="title">相信臺灣疫情控制 傾心臺灣鐵道旅遊 英國電視節目來台拍攝臺灣鐵道旅遊專輯</div></a>
                    <div class="date">2020-12-15</div>
                    <div class="text">自全球新冠疫情爆發以來，臺灣因疫情控制良好多次躍登英國主流平面及電視媒體，安全、健康、多元、包容的形象已逐漸於英國民眾心中奠基。英國Channel 5的主題紀錄片節目「世界最美麗的鐵道旅行（World’s Most Scenic Railway Journeys）」受臺灣多種軌道建設、多樣地理環境及多元文化之吸引，加以對臺灣疫情控制深具信心，在觀光局的協助下，製作單位特別安排攝影小組來台，並配合政府疫情管制措施，完成14天隔離後進行拍攝鐵道旅遊紀錄片。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"><img src="https://www.taiwan.net.tw/pic.ashx?qp=/0030265/02_0030265.jpg&sizetype=2" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                    <a href="/news_detail_05"><div class="title">全台各國家風景區送夕陽、跨年、迎曙光活動</div></a>
                    <div class="date">2020-12-15</div>
                    <div class="text">揮別新冠肺炎陰影，2021年即將到來，你想好要怎麼度過了嗎？台灣各地掀起新希望熱潮，該如何選擇地點歡送最後一道夕陽，共浴新年第一道曙光傳遞新希望。交通部觀光局特別彙整7個國家風景區、各個風光秀麗景點辦理109-110年賞夕陽、跨年及迎曙光活動資訊，規劃迎接2021的到來！讓各處地點參與迎曙光民眾許願望、迎幸福。</div>
                </div>
            </div> --}}
            
        </div>
@endsection

@section('js')

@endsection


