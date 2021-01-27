@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<style>
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
            預約管理
            <img src="\img\03\underline.png" alt="">
        </span>
    </div>
    <a class="btn btn-success mb-3" href="/admin/booking/create">新增預約資料</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th style="width: 60px">姓名</th>
                <th style="width: 60px">電話</th>
                <th style="width: 120px">信箱</th>
                <th style="width: 80px">區域</th>
                <th style="width: 80px">時間</th>
                <th style="width: 80px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{$booking->name}}</td>
                <td>{{$booking->phone}}</td>
                <td>{{$booking->email}}</td>
                <td>{{$booking->areaType->name}}</td>
                <td>{{$booking->date}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/booking/edit/{{$booking->id}}">編輯</a>
                    <a class="btn btn-danger" href="/admin/booking/destroy/{{$booking->id}}">刪除</a>
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
