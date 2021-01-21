<?php

namespace App\Http\Controllers;

use App\NewsType;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $newsTypes=NewsType::with('newss')->get();
        $newsTypes=NewsType::get();
        return view('admin.newsType.index',compact('newsTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.newsType.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        NewsType::create($request->all());
        //重新導向路徑
        return redirect('/admin/news_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $newsType=NewsType::find($id);
        return view('admin.newsType.edit',compact('newsType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $newsType = NewsType::find($id);
        $newsType->name = $request->name;
        $newsType->save();

        //重新導向路徑
        return redirect('/admin/news_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        NewsType::find($id)->delete();
        return redirect('/admin/news_type');
    }
}
