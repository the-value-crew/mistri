<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use App\SubscribeplanUser;
use App\Subscribplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribtionController extends Controller
{
    public function index()
    {
        $my_plans_ids = Auth::user()->plans->pluck('subscribplan_id');
        $ids =[];
        foreach ($my_plans_ids as $my_plans_id){
            $ids[] =$my_plans_id;
        }
        $plans = Subscribplan::all();
        return view('service_provider.subscribtionPlan.index',compact('plans','ids'));
    }

    public function update(Request $request,$id)
    {
        $data = new SubscribeplanUser();
        $data->user_id = Auth::user()->id;
        $data->subscribplan_id = $request->subscribplan_id;
        $data->save();
        return back()->with('message','Apply for plan succsessfully');
    }

    public function myPlans()
    {
        $plans =  Auth::user()->plans;
        return view('service_provider.subscribtionPlan.my_plans',compact('plans'));
    }
}
