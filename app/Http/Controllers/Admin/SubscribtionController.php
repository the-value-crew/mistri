<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SubscribeplanUser;
use App\Subscribplan;
use Illuminate\Http\Request;

class SubscribtionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Subscribplan::all();
        return view('admin.subscriptionPlan.index',compact('plans'));
    }

    public function subscribedUsers()
    {

        $users = SubscribeplanUser::latest()->get();
        return view('admin.subscriptionPlan.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('admin.subscriptionPlan.create',compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan  = new Subscribplan();
        $plan->name = $request->name;
        $plan->slug = $request->slug;
        $plan->description = $request->description;
        $plan->price = $request->price;
        $plan->save();
        return redirect(route('subscription-plan.index'))->with('message','Subscription Plan created successfully');
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
        $edit = true;
        $plan = Subscribplan::find($id);
        return view('admin.subscriptionPlan.create',compact('edit','plan'));

    }

    public function subscribedUserDetail($id)
    {
        $data = SubscribeplanUser::find($id);
        return view('admin.subscriptionPlan.showUserDetail',compact('data'));
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
        $plan = Subscribplan::find($id);
        $plan->name = $request->name;
        $plan->slug = $request->slug;
        $plan->price = $request->price;
        $plan->description = $request->description;
        $plan->save();
        return back()->with('message','Subscription Plan Updated successfully');
    }

    public function updateSubscribedUser(Request $request , $id)
    {
        $data = SubscribeplanUser::find($id);
        $data->active_from_date = $request->active_from_date;
        $data->expiry_date = $request->expiry_date;
        if($request->status){
            $data->status = $request->status;
        }else{
            $data->status = false;
        }
        $data->save();
        return back()->with('message','Subscription Plan Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Subscribplan::find($id);
        $plan->delete();
    }

    public function deleteSubscribedUser($id)
    {
        $data = SubscribeplanUser::find($id);
        $data->delete();
    }
}
