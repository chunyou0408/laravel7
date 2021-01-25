<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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


        $news = News::create($request->all());
        //圖片
        if($request->hasFile('img')){
            // $filePath=Storage::disk('public')->put('/images/news', $request->file('img'));
            // $news->img= Storage::url($filePath);
            // $news->save();


            $imageName = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('/uploaded_images'), $imageName);
            $news->img = '/uploaded_images/'.$imageName;
            $news->save();

        }else{
            //放'查無圖片'的圖片
            $news->img ='/images/no-image-found-360x250.png';
            $news->save();
        }


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

        //$request->hasFile() 查詢是否有檔案
        if ($request->hasFile('img')){
        //刪除舊圖片
        if(file_exists(public_path().$news->img)){
            if(public_path().$news->img != 'C:\github\laravel7\public/images/no-image-found-360x250.png'){
                File::delete(public_path().$news->img);
            };
        }
        //儲存圖片取得路徑
        //disk指定位置
        //put 存放檔案
        //disk(儲存資料夾) ->put(根目錄路徑,檔案)

        // $fileName=Storage::disk('public')->put('/images/news', $request->file('img'));
        //更新圖片路徑
        // $news->img = Storage::url($fileName);

        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('/uploaded_images'), $imageName);
        $news->img = '/uploaded_images/'.$imageName;
        }

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
