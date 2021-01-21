@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/booking">返回頁面</a>
    <h2>編輯預約資料</h2>
    <hr>
    <form action="/admin/booking/update/{{$booking->id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">姓名:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$booking->name}}" required>
        </div>
        <div class="form-group">
            <label for="phone">電話:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$booking->phone}}" required>
        </div>
        <div class="form-group">
            <label for="email">信箱:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$booking->email}}" required>
        </div>
        <div class="form-group">
            <label for="area_id">類別:</label>
            <select class="form-control" id="area_id" name="area_id" required>
                @foreach ($bookingTypes as $bookingType)
                    <option value="{{$bookingType->id}}"
                    @if ($booking->area_id == $bookingType->id)
                       selected
                    @else

                    @endif
                    >{{$bookingType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">日期:</label>
            <input type="date" class="form-control" min="0" id="date" name="date" value="{{$booking->date}}" required >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote();
    });
</script>
@endsection
