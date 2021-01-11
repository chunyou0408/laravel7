<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsType;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newsData=News::get();
        $newsTypes=NewsType::get();
        return view('admin.news.index',compact('newsData','newsTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $newsTypes = NewsType::get();
        return view('admin.news.create',compact('newsTypes'));
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
        News::create($request->all());
        //重新導向路徑
        return redirect('/admin/news');
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
        $newsTypes = NewsType::get();
        $news=News::find($id);

        return view('admin.news.edit',compact('news','newsTypes'));
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
        $news = News::find($id);
        $news->type_id = $request->type_id;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->date = $request->date;
        $news->save();

        //重新導向路徑
        return redirect('/admin/news');
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
        News::find($id)->delete();
        return redirect('/admin/news');
    }
}
