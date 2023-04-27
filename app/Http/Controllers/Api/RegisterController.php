<?php

namespace App\Http\Controllers\Api;

use App\Custom\FacebookLogin;
use App\Custom\GoogleLogin;
use App\Custom\NormalLogin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Admin\UserResource;
use App\User;
use App\UserOtherDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Custom\Abstracts\SocialLogin;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends CommonControllerer
{
    public function register(RegisterRequest $request)
    {
        $email = $request->email;

        $emails = User::pluck('email')->toArray();


        if(in_array($email,$emails))
        {
            return response([
                'data'=>[],
                'message'=>"User already exists with this email"
            ]);
        }

        $user = $this->saveUser($request->all());


        if ( ! $user->access_token) {
            $token = $user->access_token = $user->createToken('authToken')->accessToken;
        }
        $user->save();

        $userdetail = new UserOtherDetail();
        $userdetail->user_id = $user->id;
        $userdetail->save();




        $response = UserResource::collection(collect([$user]));


        return $response->additional([
            'status' => true,
            'code'   => Response::HTTP_OK,
        ])->response()->setStatusCode(Response::HTTP_OK);

//        return new UserResource($user, $token);


    }

    public function social_signup(Request $request)
    {

        $this->validate($request,[

            'name' => 'required|string|max:191',
            'email'=> 'required|email|max:191',
            'from' => 'required|string|min:6|max:8',
            'token'=>'required'

        ]);

//        $loginValidation = $this->validateLogin($request);


        $login_portal = $request->input('from');
        if($login_portal == 'google') {

            $is_verified           = $this->google_signup();


        } else if($login_portal == 'facebook') {
            $is_verified           = $this->facebook_signup();



        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Login from other than Google or Facebook is not allowed.',
            ]);
        }




       
        if($is_verified['status'])
        {
            $old_user = User::where('email', $request->input('email'))->first();

            if(!is_null($old_user)) {
                $user        = $old_user;
            } else {
                $user = $this->saveSocialUser($request->all());
            }


            if ( ! $user->access_token) {
               $token = $user->access_token = $user->createToken('authToken')->accessToken;
            }

            $user->save();

            $userdetail = new UserOtherDetail();
            $userdetail->user_id = $user->id;
            $userdetail->save();


            $response = UserResource::collection(collect([$user]));


            return $response->additional([
                'status' => true,
                'code'   => Response::HTTP_OK,
            ])->response()->setStatusCode(Response::HTTP_OK);
        }

    }

    private function saveUser(array $all)
    {
        $user = new User();
        $user->email  = $all['email'];
        $user->name  = $all['name'];
        if($all['password'])
        {
            $user->password = bcrypt($all['password']) ?? bcrypt(Str::random('15'));
        }
        else{
            $user->password =  bcrypt(Str::random('15'));
        }

        $user->phone       = $all['phone'] ?? '';
        $user->social_from = $all['from'];
        $user->user_type = 0;
        $user->save();

        return $user;
    }

    public function saveSocialUser(array $all)
    {
        $user = new User();
        $user->email  = $all['email'];
        $user->name  = $all['name'];
        $user->password =  bcrypt(Str::random('15'));
        $user->phone       = $all['phone'] ?? '';
        $user->social_from = $all['from'];
        $user->user_type = 0;
        $user->save();

        return $user;
    }

    private function validateLogin(Request $request)
    {
        $loginPortal = $request->input('from');



        switch ($loginPortal) {
            case 'facebook':
                return $this->facebook_signup();
                break;
            case 'google':
                return (new GoogleLogin())->verify();
                break;
            default:
                return (new NormalLogin())->verify();
        }
    }


}
