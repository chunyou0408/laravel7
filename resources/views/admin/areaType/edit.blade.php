@extends('layouts.app')

@section('css')

@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/area_type">返回頁面</a>
    <h2>編輯營區類別</h2>
    <hr>
    <form action="/admin/area_type/update/{{$areaType->id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">類別:</label>
            <input type="text" class="form-control" min="1" id="name" name="name" value="{{$areaType->name}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>

@endsection

@section('js')

@endsection
