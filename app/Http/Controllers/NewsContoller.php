<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsContoller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $news_data=DB::table('news')->get();
        return view('news')->with(compact('news_data'));
    }

    public function detail01()
    {
        return view('Insidepage01');
    }

    public function detail02()
    {
        return view('Insidepage02');
    }
    public function detail03()
    {
        return view('Insidepage03');
    }
    public function detail04()
    {
        return view('Insidepage04');
    }
    public function detail05()
    {
        return view('Insidepage05');
    }


}
