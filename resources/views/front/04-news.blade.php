@extends('layouts.00-template')
@section('css')
    <link rel="stylesheet" href="./css/04-news.css">
@endsection

@section('main')
        <section>
            <div class="news-title">
                <span>NEWS</span>
            </div>
            <div class="news-card-group">

                @foreach ($newsData as $news)
                <div class="card">
                    <img class="image1" src="{{$news->img}}" alt="">
                </div>
                <div class="card description">
                    <div>{{$news->date}} {{$news->title}}</div>
                    {!!$news->content!!}
                </div>
                @endforeach










{{--
                <div class="card">
                    <img class="image1" src="./img/04/01-01.png" alt="">
                </div>
                <div class="card description">
                    <div>2019-10-07 音樂祭</div>
                    <p>每一年我們都要相約在秋天的中央山脈，享受愛與和平的真諦。全台灣海拔最高最chill的音樂藝術節， 沒有豪華陣容，好吃好玩，充滿愛。
                    </p>
                    <span>
                        活動日期：2019年10月18日(日)
                        <br>時間：17：00-22：00
                    </span>
                </div>
                <div class="card">
                    <img class="image1" src="./img/04/02-01.png" alt="">
                </div>
                <div class="card description">
                    <div>2019-05-10 松鼠市集</div>
                    <p>讓我們著迷的，不是辦市集 今天來說說，那份心情是這樣，喜歡綁一束讓自己好心情的花；剛好你也正想帶束花回家。 那麼多那麼多，難以言喻的默契。
                    </p>
                    <span>活動日期：2019年05月16日(六)
                        <br>時間：12：00-16：00
                    </span>
                </div>
                <div class="card">
                    <img class="image1" src="./img/04/03-01.png" alt="">
                </div>
                <div class="card description">
                    <div>2019-03-25 螢火蟲季</div>
                    <p>牧場的螢火蟲季即將開始 每年4、5月是賞螢的最佳季節，4月初至5月初， 每周六晚上7點，咖啡座集合出發，步行來回約半小時， 一起去看螢火蟲囉！
                    </p>
                    <span>活動日期：2019年06月16日(日)
                        <br>時間：16：00-20：00
                    </span>
                </div>
            </div>--}}
        </section>
@endsection

