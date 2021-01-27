@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('main')
<div class="container">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>訂單狀態</th>
                <th>訂單編號</th>
                <th>姓名</th>
                <th>電話</th>
                <th>地址</th>
                <th style="width: 120px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->status}}</td>
                <td>{{$order->order_number}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/order/edit/{{$order->id}}">詳細</a>
                    <a class="btn btn-danger" href="/admin/order/destroy/{{$order->id}}">刪除</a>
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