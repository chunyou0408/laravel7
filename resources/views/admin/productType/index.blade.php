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

<div class="title_erea">
    <span class="title">
        產品類別管理
        <img src="\img\03\underline.png" alt="">
    </span>
</div>

<div class="container">
    <a class="btn btn-success mb-3" href="/admin/product_type/create">新增產品類別</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>產品類別</th>
                <th style="width: 120px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productTypes as $productType)
            <tr>
                <td>{{$productType->name}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/product_type/edit/{{$productType->id}}">編輯</a>
                    <a class="btn btn-danger" href="/admin/product_type/destroy/{{$productType->id}}">刪除</a>
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
