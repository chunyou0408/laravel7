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
            意見管理
            <img src="\img\03\underline.png" alt="">
        </span>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th style="width: 80px">姓名</th>
                <th style="width: 120px">電話</th>
                <th>內文</th>
                <th style="width: 120px">信箱</th>
                <th style="width: 120px">內容</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suggests as $suggest)
            <tr>
                <td>{{$suggest->name}}</td>

                <td>{{$suggest->phone}}</td>
                {{-- 限制字串長度 --}}
                {{-- <td>{{\Illuminate\Support\Str::limit($suggest->content, 30)}}</td> --}}
                <td>{{$suggest->email}}</td>
                <td>{!!$suggest->content!!}</td>
                <td>
                    <a class="btn btn-success" href="/admin/suggest/detail/{{$suggest->id}}">詳細</a>
                    <a class="btn btn-danger" href="/admin/suggest/destroy/{{$suggest->id}}">刪除</a>
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
