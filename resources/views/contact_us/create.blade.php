@extends('layouts.template')

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
    <form action="/contact_us/store" method="post">
        @csrf
        <div class="_button"><a href="/contact_us">返回首頁</a></div>

        <div class="form-group">
            <h1>新增聯絡我們資料</h1>
        </div>
        <div class="form-group">
            姓名:
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            電話:
            <input type="text" name="phone" id="phone" required>
        </div>
        <div class="form-group">
            EMAIL:
            <input type="text" name="email" id="email" required>
        </div>
        <div class="form-group">
            主旨:
            <input type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            內文:
            <textarea  cols="30" rows="10" name="content" id="content" required></textarea>
        </div>
        <div class="form-group">
            <button>送出</button>
        </div>
    </form>


@endsection

@section('js')

@endsection
