<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    //
    public function book_index()
    {

        return '123';
    }
    //
    public function index()
    {
        //取得資料庫資料,並傳值給前端顯示資料
        $ContactUs=ContactUs::get();
        return view('contact_us.index')->with(compact('ContactUs'));
    }

    public function create()
    {
        return view('contact_us.create');
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
        //重新導向路徑
        return redirect('/contact_us');


    }

    public function destroy($id)
    {
        // ContactUs::create($request->all());

        // return action('ContactUsController@index');
        ContactUs::find($id)->delete();
        return redirect('/contact_us');
    }

    public function updata(Request $request,$id)
    {
        $contact_us = ContactUs::find($id);
        $contact_us->name = $request->name;
        $contact_us->phone = $request->phone;
        $contact_us->email = $request->email;
        $contact_us->title = $request->title;
        $contact_us->content = $request->content;
        $contact_us->save();

        //重新導向路徑
        return redirect('/contact_us');
    }

    public function edit($id)
    {
        // dd($id);
        $data=ContactUs::find($id);
        // dd(compact('ContactUs'));
        return view('contact_us.edit')->with(compact('data'));
    }



}
