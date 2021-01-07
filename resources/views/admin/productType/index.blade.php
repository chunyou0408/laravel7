@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/product_type/create">新增產品類別</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>產品類別</th>
                <th>功能</th>
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