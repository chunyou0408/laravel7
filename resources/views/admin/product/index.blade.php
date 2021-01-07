@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="container">
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
            @foreach ($products as $product)
            <tr>
                <td>{{$product->type_id}}</td>
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