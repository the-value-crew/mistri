<?php

namespace App\Http\Controllers\ServiceProvider;

use App\AvailableOn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $availability = AvailableOn::where('vendor_id',Auth::user()->id)->first();
        return view('service_provider.available_on',compact('availability','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        $avail = AvailableOn::where('vendor_id',$id)->first();
//        return $avail;
        if(!$avail){
            $avail = new AvailableOn();
            $avail->vendor_id = $id;
            $avail->monday_opening_time = $request->monday_opening_time;
            $avail->monday_closing_time = $request->monday_closing_time;
            $avail->monday_status = $request->monday_status;

            $avail->tuesday_opening_time = $request->tuesday_opening_time;
            $avail->tuesday_closing_time = $request->tuesday_closing_time;
            $avail->tuesday_status = $request->tuesday_status;

            $avail->wednesday_opening_time = $request->wednesday_opening_time;
            $avail->wednesday_closing_time = $request->wednesday_closing_time;
            $avail->wednesday_status = $request->wednesday_status;

            $avail->thursday_opening_time = $request->thursday_opening_time;
            $avail->thursday_closing_time = $request->thursday_closing_time;
            $avail->thursday_status = $request->thursday_status;


            $avail->friday_opening_time = $request->friday_opening_time;
            $avail->friday_closing_time = $request->friday_closing_time;
            $avail->friday_status = $request->friday_status;

            $avail->saturday_opening_time = $request->saturday_opening_time;
            $avail->saturday_closing_time = $request->saturday_closing_time;
            $avail->saturday_status = $request->saturday_status;

            $avail->sunday_opening_time = $request->sunday_opening_time;
            $avail->sunday_closing_time = $request->sunday_closing_time;
            $avail->sunday_status = $request->sunday_status;

            $avail->save();
           return back();

        }

        $avail->monday_opening_time = $request->monday_opening_time;
        $avail->monday_closing_time = $request->monday_closing_time;
        $avail->monday_status = $request->monday_status;

        $avail->tuesday_opening_time = $request->tuesday_opening_time;
        $avail->tuesday_closing_time = $request->tuesday_closing_time;
        $avail->tuesday_status = $request->tuesday_status;

        $avail->wednesday_opening_time = $request->wednesday_opening_time;
        $avail->wednesday_closing_time = $request->wednesday_closing_time;
        $avail->wednesday_status = $request->wednesday_status;

        $avail->thursday_opening_time = $request->thursday_opening_time;
        $avail->thursday_closing_time = $request->thursday_closing_time;
        $avail->thursday_status = $request->thursday_status;


        $avail->friday_opening_time = $request->friday_opening_time;
        $avail->friday_closing_time = $request->friday_closing_time;
        $avail->friday_status = $request->friday_status;

        $avail->saturday_opening_time = $request->saturday_opening_time;
        $avail->saturday_closing_time = $request->saturday_closing_time;
        $avail->saturday_status = $request->saturday_status;

        $avail->sunday_opening_time = $request->sunday_opening_time;
        $avail->sunday_closing_time = $request->sunday_closing_time;
        $avail->sunday_status = $request->sunday_status;
        $avail->save();
        return back();

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
    }
}
