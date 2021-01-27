@extends('layouts.app')

@section('css')

@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/suggest">返回頁面</a>
    <h2>意見詳細內容</h2>
    <hr>
    <form>
        @csrf
        <div class="form-group">
            <label for="title">姓名:</label>
            <input type="text" class="form-control" value="{{$suggest->name}}"  readonly unselectable="on">
        </div>
        <div class="form-group">
            <label for="content">電話:</label>
            <input type="text" class="form-control" value="{{$suggest->phone}}"  readonly unselectable="on">
        </div>
        <div class="form-group">
            <label for="date">電子信箱:</label>
            <input type="text" class="form-control" value="{{$suggest->email}}"  readonly unselectable="on">
        </div>
        <div class="form-group">
            <label for="img">內容:</label>
            <textarea type="text" class="form-control" readonly unselectable="on">{{$suggest->content}}</textarea>
        </div>
        </form>





</div>

@endsection

@section('js')

@endsection
