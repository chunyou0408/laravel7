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
            最新消息管理
            <img src="\img\03\underline.png" alt="">
        </span>
    </div>
    <a class="btn btn-success mb-3" href="/admin/news/create">新增最新消息</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th style="width: 80px">類別</th>
                <th style="width: 120px">標題</th>
                <th>內文</th>
                <th style="width: 120px">日期</th>
                <th style="width: 120px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsData as $news)
            <tr>
                {{-- <td>{{$product->type_id}}</td> --}}
                <?php
                // dd($product->$productTypes->name);
                    // $typeData = App\ProductType::find($product->type_id);
                ?>

                {{-- <td>{{$product->$productType->name}}</td> --}}
                <td>{{$news->newsType->name}}</td>

                <td>{{$news->title}}</td>
                {{-- 限制字串長度 --}}
                {{-- <td>{{\Illuminate\Support\Str::limit($news->content, 30)}}</td> --}}
                <td>{!!$news->content!!}</td>
                <td>{{$news->date}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/news/edit/{{$news->id}}">編輯</a>
                    <a class="btn btn-danger" href="/admin/news/destroy/{{$news->id}}">刪除</a>
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
