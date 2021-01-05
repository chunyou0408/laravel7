@extends('layouts.template')
@section('css')
    <style>
        main{
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
        table,th,td{
            border: 1px solid #000;
        }
        section{
          display: flex;
          flex-direction:column;
        }
        ._button{

        }
        td a{
          padding: 10px;
        }
    </style>
@endsection

@section('main')
<div class="_button"><a href="/contact_us/create">新增資料</a></div>
    <table>
        <thead>
          <tr>
            <th>姓名</th>
            <th>電話</th>
            <th>Email</th>
            <th>主旨</th>
            <th>內容</th>
            <th>最後更改時間</th>
          </tr>
        </thead>
        <tbody>
          {{-- <tr>
            <td>Body content 132132132132 13213213213 1</td>
            <td>Body content 2</td>
            <td>Body content 3</td>
            <td>Body content 4</td>
            <td>Body content 5</td>
          </tr> --}}
          @foreach ($ContactUs as $data)
          <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->content}}</td>
            <td>{{$data->updated_at}}</td>
            <td><a href="contact_us/edit/{{$data->id}}">編輯</a></td>
            <td><a href="contact_us/destroy/{{$data->id}}">刪除</a></td>
            {{-- <td><button id="create_btn"  onClick="location.href='contact_us/destroy'">刪除資料</button></td> --}}
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- <section>
        <button id="create_btn"  onClick="location.href='contact_us/create'">新增資料</button>
        <button id="create_btn"  onClick="location.href='contact_us/create'">更改資料</button>
        <button id="create_btn"  onClick="location.href='contact_us/destroy'">刪除資料</button>
      </section> --}}
@endsection


@section('js')

@endsection
      