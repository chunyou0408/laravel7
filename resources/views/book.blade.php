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

            @foreach ($news_data as $news)
            <div class="card">
                <div class="img"><img src="{{$news->img}}" alt=""></div>
                <div class="content">
                    <div class="news_box">最新消息</div>
                    <a href="{{$news->img}}"><div class="title">{{$news->title}}</div></a>
                    <div class="date">{{$news->date}}</div>
                    <div class="text">{{$news->content}}</div>
                </div>
            </div>
            @endforeach

     
            
        </div>
@endsection

@section('js')

@endsection


