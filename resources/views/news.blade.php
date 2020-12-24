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
        padding: 50px 20px;
        border-bottom: 1px solid #000;
    }
    .card {
        width: 100%;
        height: auto;
        display: flex;
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
    }
    .content{
        width: 64%;
        padding-left: 30px;
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
            <h1>最新消息</h1>
            <div class="card">
                <div class="img"><img src="https://www.taiwan.net.tw/pic.ashx?qp=/0030275/13_0030275_1.jpg&sizetype=2" alt=""></div>
                <div class="content">
                    <div class="title">「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</div>
                    <div class="date">2020-12-24</div>
                    <div class="text">109年「台灣觀巴」優良管理業者、最佳優質路線及最佳服務人員評選結果揭曉。交通部觀光局為提供國內外旅客在臺灣的便利觀光旅遊服務，自93年度起推出「台灣觀巴」套裝旅遊產品，其以優質多元行程與便捷貼心服務，成為台灣旅遊的優質品牌。本年經評選出服務品質優化績優業者前3名、最佳優質路線前10名、服務品質優良獎業者1名及最佳服務人員8名，並於今日假觀光局台北旅遊服務中心舉行頒獎典禮。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"></div>
                <div class="content">
                    <div class="title">「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</div>
                    <div class="date">2020-12-24</div>
                    <div class="text">109年「台灣觀巴」優良管理業者、最佳優質路線及最佳服務人員評選結果揭曉。交通部觀光局為提供國內外旅客在臺灣的便利觀光旅遊服務，自93年度起推出「台灣觀巴」套裝旅遊產品，其以優質多元行程與便捷貼心服務，成為台灣旅遊的優質品牌。本年經評選出服務品質優化績優業者前3名、最佳優質路線前10名、服務品質優良獎業者1名及最佳服務人員8名，並於今日假觀光局台北旅遊服務中心舉行頒獎典禮。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"></div>
                <div class="content">
                    <div class="title">「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</div>
                    <div class="date">2020-12-24</div>
                    <div class="text">109年「台灣觀巴」優良管理業者、最佳優質路線及最佳服務人員評選結果揭曉。交通部觀光局為提供國內外旅客在臺灣的便利觀光旅遊服務，自93年度起推出「台灣觀巴」套裝旅遊產品，其以優質多元行程與便捷貼心服務，成為台灣旅遊的優質品牌。本年經評選出服務品質優化績優業者前3名、最佳優質路線前10名、服務品質優良獎業者1名及最佳服務人員8名，並於今日假觀光局台北旅遊服務中心舉行頒獎典禮。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"></div>
                <div class="content">
                    <div class="title">「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</div>
                    <div class="date">2020-12-24</div>
                    <div class="text">109年「台灣觀巴」優良管理業者、最佳優質路線及最佳服務人員評選結果揭曉。交通部觀光局為提供國內外旅客在臺灣的便利觀光旅遊服務，自93年度起推出「台灣觀巴」套裝旅遊產品，其以優質多元行程與便捷貼心服務，成為台灣旅遊的優質品牌。本年經評選出服務品質優化績優業者前3名、最佳優質路線前10名、服務品質優良獎業者1名及最佳服務人員8名，並於今日假觀光局台北旅遊服務中心舉行頒獎典禮。</div>
                </div>
            </div>
            <div class="card">
                <div class="img"></div>
                <div class="content">
                    <div class="title">「台灣觀巴」優質貼心服務伴您便捷暢遊全臺</div>
                    <div class="date">2020-12-24</div>
                    <div class="text">109年「台灣觀巴」優良管理業者、最佳優質路線及最佳服務人員評選結果揭曉。交通部觀光局為提供國內外旅客在臺灣的便利觀光旅遊服務，自93年度起推出「台灣觀巴」套裝旅遊產品，其以優質多元行程與便捷貼心服務，成為台灣旅遊的優質品牌。本年經評選出服務品質優化績優業者前3名、最佳優質路線前10名、服務品質優良獎業者1名及最佳服務人員8名，並於今日假觀光局台北旅遊服務中心舉行頒獎典禮。</div>
                </div>
            </div>
        </div>
@endsection

@section('js')

@endsection


