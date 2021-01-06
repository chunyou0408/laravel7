@extends('layouts.app')
@section('css')
    <style>
        form{
            border: 1px solid #000;
            width: 40%;
            margin: auto;
        }
        .form-group{
            border-bottom: 1px solid #000;
            padding: 15px 10px;
        }
        button{
             cursor: pointer;
        }
    
    </style>
@endsection

@section('main')
    <form action="/contact_us/updata/{{$data->id}}" method="post">
        @csrf
        <div class="_button"><a href="/contact_us">返回首頁</a></div>
        
        <div class="form-group">
            <h1>修改聯絡我們資料</h1>    
        </div>
        <div class="form-group">
            姓名:
            <input type="text" name="name" id="name" value="{{$data->name}}" required>
        </div>
        <div class="form-group">
            電話:
            <input type="text" name="phone" id="phone" value="{{$data->phone}}" required>
        </div>
        <div class="form-group">
            EMAIL:
            <input type="text" name="email" id="email" value="{{$data->email}}" required>
        </div>
        <div class="form-group">
            主旨:
            <input type="text" name="title" id="title" value="{{$data->title}}" required>
        </div>
        <div class="form-group">
            內文:
            <textarea  cols="30" rows="10" name="content" id="content" required>{{$data->content}}</textarea>
        </div>
        <div class="form-group">
            <button>送出</button>
        </div>
    </form>



@endsection

@section('js')

@endsection
