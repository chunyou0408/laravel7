@extends('layouts.app')

@section('css')

@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/news">返回頁面</a>
    <h2>編輯最新消息</h2>
    <hr>
    <form action="/admin/news/update/{{$news->id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="type_id">類別:</label>
            <select class="form-control" id="type_id" name="type_id" required>
                @foreach ($newsTypes as $newsType)
                    <option value="{{$newsType->id}}"
                    @if ($news->type_id == $newsType->id)
                       selected
                    @else

                    @endif
                    >{{$newsType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">標題:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}" required>
        </div>
        <div class="form-group">
            <label for="content">內文:</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{$news->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="date">日期:</label>
            <input type="date" class="form-control" min="0" id="date" name="date" value="{{$news->date}}" required >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>

@endsection

@section('js')

@endsection
