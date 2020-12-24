{{-- 要將內容塞入哪個模板 --}}
@extends('layouts.template')

{{-- 要連入CSS區塊的東西 --}}
@section('css')

@endsection


@section('main')
{{--

<h1>{{$name.' '.$age.' '.$gender}}</h1>

<h1>{{$name}} {{$age}} {{$gender}}</h1>

<h1>{{$name}}&nbsp;{{$age}}&nbsp;{{$gender}}</h1>

 --}}
 <h1>{{$name}} {{$age}} {{$gender}}</h1>
<img src="https://crazypetter.com.tw/wp-content/uploads/2019/07/BLOW-%E6%88%90%E9%95%B7%E5%8F%B2_190413_0911.jpg" alt="">
@endsection


@section('js')

@endsection


