@extends('layouts.00-template')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<style>
    .container{
        padding-top: 55px;
        min-height: calc(100vh - 382px);
    }
    .title_erea{
       display: flex;
       justify-content: center;
    }

    .title{
        position: relative;
        font-size: 32px;
        margin: 0 auto;
    }

    .title img{
        position: absolute;
        top: 20px;
        left: -15px;
        width: 120%;
        z-index: -1;
    }

    .margin-bottom{
        margin-bottom: 20px;
    }
</style>
@endsection

@section('main')
<div class="container">
    <div class="title_erea">
        <span class="title">
            查詢預約
            <img src="\img\03\underline.png" alt="">
        </span>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>日期</th>
                <th>區域</th>
                <th>姓名</th>
                <th>電話</th>
                <th>地址</th>
                <th style="width: 120px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{$booking->date}}</td>
                <td>{{$booking->areaType->name}}</td>
                <td>{{$booking->name}}</td>
                <td>{{$booking->phone}}</td>
                <td>{{$booking->address}}</td>
                <td>
                    <a class="btn btn-success" href="/checkoutend/{{$booking->order_number}}">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection
