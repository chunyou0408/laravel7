@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="container">
    <a class="btn btn-success" href="/admin/news/create">新增最新消息</a>
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
                    <a class="btn btn-success" href="/admin/suggest/edit/{{$suggest->id}}">編輯</a>
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
