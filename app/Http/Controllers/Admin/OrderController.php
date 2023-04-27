<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\SubscribeplanUser;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::where('suggest_vendor',false)->latest()->get();
        return view('admin.order.index',compact('orders'));
    }

    public function pending()
    {
        $orders = Order::where('suggest_vendor',false)->where('status','pending')->latest()->get();
        return view('admin.order.index',compact('orders'));

    }

    public function confirmedOrder()
    {
        $orders = Order::where('status','confirmed')->latest()->get();
        return view('admin.order.index',compact('orders'));
    }

    public function declinedOrder()
    {
        $orders = Order::where('status','declined')->latest()->get();
        return view('admin.order.index',compact('orders'));
    }

    public function suggestVendor()
    {
        $orders = Order::where('suggest_vendor',1)->latest()->get();
        return view('admin.order.index',compact('orders'));
    }

    public function completedOrder()
    {
        $orders = Order::where('status','completed')->latest()->get();
        return view('admin.order.index',compact('orders'));
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
        //
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
        $order = Order::find($id);
        return view('admin.order.show',compact('order'));

    }

    public function suggestVendorToClient($id)
    {
        $datas = SubscribeplanUser::where('status','on')->pluck('user_id');
        $subscribed_vendors =[];

        foreach ($datas as $data){
            $subscribed_vendors[] = $data;
        }

        $order = Order::find($id);
        return view('admin.order.suggest_vendor',compact('order','subscribed_vendors'));
    }


    public function suggestVendorSubmit(Request $request,$id)
    {
        $order = Order::find($id);
        $order->provider_id = $request->provider_id;
        $order->suggest_vendor = false;
        $order->save();

        return redirect(route('order.index'));

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
