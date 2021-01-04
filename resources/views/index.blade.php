@extends('layouts.template')
@section('css')
    <style>
        main{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table,th,td{
            border: 1px solid #000;
        }
    </style>
@endsection

@section('main')
    <table>
        <thead>
          <tr>
            <th>姓名</th>
            <th>電話</th>
            <th>Email</th>
            <th>主旨</th>
            <th>內容</th>
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
          @foreach ($ContactUs as $contact_us)
          <tr>
            <td>{{$contact_us->name}}</td>
            <td>{{$contact_us->phone}}</td>
            <td>{{$contact_us->email}}</td>
            <td>{{$contact_us->title}}</td>
            <td>{{$contact_us->content}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection


@section('js')

@endsection
      