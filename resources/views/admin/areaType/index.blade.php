@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="container">
    <a class="btn btn-success" href="/admin/area_type/create">新增營區類別</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>營區類別</th>
                <th style="width: 120px">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areaTypes as $areaType)
            <tr>
                <td>{{$areaType->name}}</td>
                <td>
                    <a class="btn btn-success" href="/admin/area_type/edit/{{$areaType->id}}">編輯</a>
                    <a class="btn btn-danger" href="/admin/area_type/destroy/{{$areaType->id}}">刪除</a>
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
