@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="container">
    <a class="btn btn-success" href="/admin/booking_type/create">新增預約類別</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>預約類別</th>
                <th style="width: 120px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookingTypes as $bookingType)
            <tr>
                <td>{{$bookingType->name}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/booking_type/edit/{{$bookingType->id}}">編輯</a>
                    <a class="btn btn-danger" href="/admin/booking_type/destroy/{{$bookingType->id}}">刪除</a>
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
