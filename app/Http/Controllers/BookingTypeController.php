<?php

namespace App\Http\Controllers;

use App\BookingType;
use Illuminate\Http\Request;

class BookingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookingTypes=BookingType::get();
        return view('admin.bookingType.index',compact('bookingTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.bookingType.create');
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
        BookingType::create($request->all());
        //重新導向路徑
        return redirect('/admin/booking_type');
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
        $bookingType=BookingType::find($id);
        return view('admin.bookingType.edit',compact('bookingType'));
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
        $bookingType = BookingType::find($id);
        $bookingType->name = $request->name;
        $bookingType->save();

        //重新導向路徑
        return redirect('/admin/booking_type');
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
        BookingType::find($id)->delete();
        return redirect('/admin/booking_type');
    }
}
