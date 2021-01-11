<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::get();
        $productTypes=ProductType::get();
        return view('admin.product.index',compact('products','productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productTypes = ProductType::get();
        return view('admin.product.create',compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName=Storage::disk('public')->put('/images', $request->file('img'));
        $product=Product::create($request->all());

        // $product->img = Storage::url($fileName);
        // 或
        $product->img = '/storage/'.$fileName;

        $product->save();

        return redirect('/admin/product');
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
        $productTypes = ProductType::get();
    
        //1.在取資料時,同時取得關聯的資料
        // $product=Product::with('productType')->find($id);
        // dd($product->productType);

        //2.需要資料時,才利用關聯function取得資料
        $product=Product::find($id);
        //$product->關聯含式名稱
        //$product->productType
        //dd($product->productType->name);


        return view('admin.product.edit',compact('product','productTypes'));
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

        $product = Product::find($id);
        $product->type_id = $request->type_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        
        //2.判斷是否有新圖片
        if ($request->hasFile('img')){
            //刪除舊圖片
            if(file_exists(public_path().$product->img)){
                File::delete(public_path().$product->img);
            }
            //儲存圖片取得路徑
            $fileName=Storage::disk('public')->put('/images', $request->file('img'));
            //更新圖片路徑
            $product->img = Storage::url($fileName);
        }

        

        $product->save();

        //重新導向路徑
        // return redirect()->route('create');
        return redirect('/admin/product');
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
        Product::find($id)->delete();
        return redirect('/admin/product');

    }
}
