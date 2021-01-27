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
            最新消息類別管理
            <img src="\img\03\underline.png" alt="">
        </span>
    </div>
    <a class="btn btn-success mb-3" href="/admin/news_type/create">新增最新消息類別</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>最新消息類別</th>
                <th style="width: 120px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsTypes as $newsType)
            <tr>
                <td>{{$newsType->name}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/news_type/edit/{{$newsType->id}}">編輯</a>
                    <a class="btn btn-danger" href="/admin/news_type/destroy/{{$newsType->id}}">刪除</a>
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
