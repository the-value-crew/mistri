<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends CommonControllerer
{
    public function login(Request $request)
    {
        // validate the login parameters
        $validation = $this->my_validation(['email' => 'required|email', 'password' => 'required|string|min:5']);


        if(!$validation['status']) {
            return response()->json([
                'status' => false,
                'code' => 400,
                'message'=>'The given data was invalid.',
                'errors' => $validation['message']], 400);
        }

        // if login is not successful
        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {

            return response()->json(['status' => false, 'code' => 400, 'message' => 'Login failed, Invalid credentials!'], 400);
        }

        $user = User::where('email', $request->email)->first();
        if(is_null($user->access_token)) {
            //$user->access_token = $user->createToken('Access Token', ['*']);//creates the token
            $user->access_token = $user->createToken('authToken')->accessToken; //this automatically gives the passport token
            $user->save();
        }

        $response = UserResource::collection(collect([$user]));


        return $response->additional([
            'status' => true,
            'code'   => Response::HTTP_OK,
        ])->response()->setStatusCode(Response::HTTP_OK);

    }
}
