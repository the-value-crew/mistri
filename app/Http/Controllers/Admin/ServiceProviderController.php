<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordSetMail;
use App\User;
use App\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ServiceProviderController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['providers']= User::where('user_type',1)->where('id','!=',1)->orderBy('created_at','desc')->get();
       return view('admin.serviceProvider.index',$this->data);

    }

    public function allServices($name , $id)
    {
       $this->data['service_provider'] = User::with('services')->where('id',$id)->first();
        $this->data['name'] = $name;
        return view('admin.serviceProvider.allServices',$this->data);
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
        $this->data['user'] = User::find($id);
        return view('admin.serviceProvider.show',$this->data);

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

    public function setPriority( $id)
    {
        $user = User::find($id);
        $priority = \request()->priority;

        $user->priority = $priority;
        $user->save();

        return response()->json(['message' => $user->name . ' priority changed to ' . $priority]);

    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);


        if($user->status == 1)
        {
            $user->status = 0;
            $user->save();
        }
        else{
            $user->status = 1;
            $user->email_token = $user->createToken('Access Token', ['*'])->accessToken;//this automatically gives the passport token
            //Mail::to($user->email)->send(new PasswordSetMail($user));
            $user->save();

        }



        return response()->json(['message'=>'Service provider status updated successfully .']);
    }


    public function assign_percentage(Request $request, $service_provider_id)
    {
        if($request->service_ids)
        {
            foreach ($request->service_ids as $id)
            {
                $data = UserService::where('user_id',$service_provider_id)->where('service_id',$id)->first();
                $data->profit_in_percentage = $request->profit_in_percentage;
                $data->save();
            }

            return back()->with('message','Profit percentage assign successfully');

        }else{
            return back()->with('failure_message','You must select atleast one service to assign profit percentage');
        }

    }

    public function changeStatus($id)
    {
        $data = UserService::find($id);
        if($data->feature ==1)
        {
            $data->feature= 0;
        }else{
            $data->feature= 1;
        }

        $data->save();

        return response()->json(['message' => "Status Updated Successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function deleteServiceProviderService($id)
    {
        $data = UserService::find($id);
        $data->delete();

    }
}
