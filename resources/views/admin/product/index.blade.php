@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<style>
    .title{
        position: relative;
        font-size: 32px;
    }
    .title img{
        position: absolute;
        top: 20px;
        left: -15px;
        /* width: 180px; */
        width: 120%;
        z-index: -1;
    }

</style>
@endsection

@section('main')

<div class="container">
    <div class="title_erea">
        <span class="title">
            {{-- <h1 style="text-align: center">產品管理</h1> --}}
            產品管理
            <img src="\img\03\underline.png" alt="">
        </span>
    </div>
    <a class="btn btn-success" href="/admin/product/create">新增產品</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>類別</th>
                <th>名稱</th>
                <th>價格</th>
                <th>圖片</th>
                <th>功能</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($products)}} --}}
            @foreach ($products as $product)
            <tr>
                {{-- <td>{{$product->type_id}}</td> --}}
                <?php
                // dd($product->$productTypes->name);
                    // $typeData = App\ProductType::find($product->type_id);
                ?>

                {{-- <td>{{$product->$productType->name}}</td> --}}
                <td>{{$product->productType->name}}</td>

                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td><img  width="200" src="{{$product->img}}" alt=""></td>
                <td>
                    <a class="btn btn-success" href="/admin/product/edit/{{$product->id}}">編輯</a>
                    <a class="btn btn-danger" href="/admin/product/destroy/{{$product->id}}">刪除</a>
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
