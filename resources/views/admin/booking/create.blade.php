@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('main')
<div class="container">
    <a class="btn btn-success" href="/admin/booking">返回頁面</a>
    <h2>新增預約資料</h2>
    <hr>
    <form action="/admin/booking/store" method="post">
        @csrf
        <div class="form-group">
            <label for="name">姓名:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="content">電話:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="content">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="area_id">區域:</label>
            <select class="form-control" id="area_id" name="area_id" required>
                @foreach ($areaTypes as $areaType)
                    <option value="{{$areaType->id}}">{{$areaType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">日期:</label>
            <input type="date" class="form-control" min="0" id="date" name="date" required>
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
<script>
    var yyyymmdd =document.querySelector('#date');
    var year = new Date().getFullYear(); //年 目前年份
    var month = new Date().getMonth();//月 目前月份
    var date = new Date().getDate()+1;//日 目前天數+1天

    tomorrow=year+"-"+pad((month+1),2)+"-"+pad(date,2)
    yyyymmdd.setAttribute('value',tomorrow);

    //將數字補零 num=數字 n=位數
    function pad(num, n) {
        if ((num + "").length >= n) return num;
        return pad("0" + num, n);
    }
</script>
@endsection
