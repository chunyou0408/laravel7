<?php

namespace App\Http\Controllers;

use App\Booking;
use App\AreaType;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings=Booking::get();
        $areaTypes=AreaType::get();
        return view('admin.booking.index',compact('bookings','areaTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areaTypes=AreaType::get();
        return view('admin.booking.create',compact('areaTypes'));
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
        Booking::create($request->all());
        return redirect('/admin/booking');
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
        $areaTypes = AreaType::get();
        $booking=Booking::find($id);

        return view('admin.booking.edit',compact('booking','areaTypes'));
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
        $booking = Booking::find($id);
        $booking->name = $request->name;
        $booking->phone = $request->phone;
        $booking->area_id = $request->area_id;
        $booking->date = $request->date;
        $booking->save();

        //重新導向路徑
        return redirect('/admin/booking');
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
        Booking::find($id)->delete();
        return redirect('/admin/booking');
    }
}
