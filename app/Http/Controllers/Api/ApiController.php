<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PageResource;
use App\Http\Resources\Api\UserResource;
use App\Page;
use App\User;
use App\UserOtherDetail;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getUserProfile()
    {

        $user1 = auth()->guard('api')->user();
        $user = User::where('id',$user1->id)->with('userdetail')->first();
        return UserResource::collection(collect([$user]))->additional(['status' => true, 'message' => "success", 'code' => 200], 200);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->guard('api')->user();
        $user->name = $request->name;

        $user->phone = $request->phone;

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/uploads/user/',$name);
            $user->image=$name;

        }


        $user->save();

        $detail = UserOtherDetail::where('user_id',$user->id)->first();

        $detail->fulladdress = $request->fulladdress;

        $detail->street = $request->street;
        $detail->building = $request->building;
        $detail->flat_number = $request->flat_number;
        $detail->addtional_direction = $request->additional_direction;
        $detail->save();

        return UserResource::collection(collect([$user]))->additional(['status' => true, 'message' => "Profile Updated Successfully", 'code' => 200], 200);


    }

    public function privacyPolicy()
    {
        $page = Page::find(4);
        return new PageResource($page);
    }


    public function termsAndConditions()
    {
        $page = Page::find(5);
        return new PageResource($page);
    }

    public function logout()
    {
        $user = auth()->guard('api')->user();
        foreach ($user->tokens as $token) {
            $token->revoke();
        }

        $user->access_token = null;

        $user->save();

        return response()->json(['status' => true, 'message' => 'Successfully logged out.', 'code' => 200]);
    }

    public function feedback(Request $request)
    {
        $enquiry = new \App\GeneralEnquiry();

        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->message = $request->feedback;
        $enquiry->save();

        return response()->json(['status' => true, 'message' => 'Your feedback sent successfully.', 'code' => 200]);

    }
}
