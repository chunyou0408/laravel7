<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function index()
    {
        //取得資料庫資料,並傳值給前端顯示資料
        $ContactUs=ContactUs::get();
        return view('index')->with(compact('ContactUs'));
    }

    public function create()
    {
        return view('create');
    }

    //內容已經寫好的新增資料
    // public function create()
    // {
    //     //
    //     ContactUs::create([
    //         'name' => 'apple',
    //         'phone' => '0930123456',
    //         'email' => 'ao123@gmail.com',
    //         'title' => 'test20210104',
    //         'content' => 'aaaaaaaaaaaaaaa',
    //     ]);

    //     return "success";
    // }

    public function store(Request $request)
    {
        //方法一

        // ContactUs::create([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);

        //方法二

        ContactUs::create($request->all());

        return "success";
    }
    


    
}
