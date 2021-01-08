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
                <th>類別</th>
                <th>標題</th>
                <th>內文</th>
                <th>日期</th>
                <th>功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newss as $news)
            <tr>
                {{-- <td>{{$product->type_id}}</td> --}}
                <?php
                // dd($product->$productTypes->name);
                    // $typeData = App\ProductType::find($product->type_id);
                ?>

                {{-- <td>{{$product->$productType->name}}</td> --}}
                <td>{{$news->newsType->name}}</td>

                <td>{{$news->title}}</td>
                <td>{{$news->content}}</td>
                <td>{{$news->date}}></td>
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
