<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImg;
use App\ProductType;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
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
        $product = Product::create($request->all());



        //主要圖片
        if($request->hasFile('img')){
            // $filePath=Storage::disk('public')->put('/images/product', $request->file('img'));
            // $product->img= Storage::url($filePath);
                // $product->img = Storage::url($fileName);
                // 或
                // $product->img = '/storage/'.$fileName;
            $image = \Imgur::upload($request->file('img'));

            // $imageName = time().'.'.$request->img->getClientOriginalExtension();
            // $request->img->move(public_path('/uploaded_images'), $imageName);
            $product->img = $image->link();
            $product->save();

        }else{
            //放'查無圖片'的圖片
            $product->img ='/images/no-image-found-360x250.png';
            $product->save();
        }

        //其他圖片
        if($request->hasFile('imgs')){
            $count = 0;
            foreach ($request->imgs as $img){

                $imageName = time().$count.'.'.$img->getClientOriginalExtension();
                $img->move(public_path('/uploaded_images'), $imageName);
                $product->img = '/uploaded_images/'.$imageName;

                ProductImg::create([
                    'product_id'=>$product->id,
                    'url'=>$product->img,
                ]);
                $count =$count + 1;
                // $filePath=Storage::disk('public')->put('/images/product', $img);

                // ProductImg::create([
                //     'product_id'=>$product->id,
                //     'url'=>Storage::url($filePath),
                // ]);

            }
        }



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

        //1.不用關聯的方法
        //找出資料庫相同id的資料
        // $productImgs=ProductImg::where('product_id',$product->id)->get();

        // return view('admin.product.edit',compact('product','productTypes','productImgs'));

        //2.關聯的方法

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
        //$request->hasFile() 查詢是否有檔案
        if ($request->hasFile('img')){
            //刪除舊圖片
            if(file_exists(public_path().$product->img)){
                if(public_path().$product->img != 'C:\github\laravel7\public/images/no-image-found-360x250.png'){
                    File::delete(public_path().$product->img);
                };
            }
            //儲存圖片取得路徑
            //disk指定位置
            //put 存放檔案
            //disk(儲存資料夾) ->put(根目錄路徑,檔案)

            // $fileName=Storage::disk('public')->put('/images/product', $request->file('img'));
            //更新圖片路徑
            // $product->img = Storage::url($fileName);

            $imageName = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('/uploaded_images'), $imageName);
            $product->img = '/uploaded_images/'.$imageName;
        }

        $product->save();



        //其他圖片
        if($request->hasFile('imgs')){
            $count = 0;
            foreach ($request->imgs as $img){

                $imageName = time().$count.'.'.$img->getClientOriginalExtension();
                $img->move(public_path('/uploaded_images'), $imageName);
                $product->img = '/uploaded_images/'.$imageName;

                ProductImg::create([
                    'product_id'=>$product->id,
                    'url'=>$product->img,
                ]);
                $count =$count + 1;
                // $filePath=Storage::disk('public')->put('/images/product', $img);

                // ProductImg::create([
                //     'product_id'=>$product->id,
                //     'url'=>Storage::url($filePath),
                // ]);

            }
        }



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

    public function deleteImg(Request $request)
    {
        //1.利用id尋找產品圖片

        $productImg = ProductImg::find($request->id);
        //2.刪除產品圖片檔案
        //判斷是否有找到productImg
        if($productImg){
            if(file_exists(public_path().$productImg->url)){
                //
                File::delete(public_path().$productImg->url);
            };
        }
        //3.刪除產品圖片資料
        $productImg->delete();
        //4.返回success
        return "success";
    }

}
