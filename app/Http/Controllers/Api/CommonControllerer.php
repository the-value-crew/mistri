<?php

namespace App\Http\Controllers\Api;

use App\DeepcleaningOrder;
use App\Exceptions\SocialLoginException;
use App\Http\Controllers\Controller;
use App\PaintingOrder;
use App\PestControlOrder;
use App\SanitizationOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class CommonControllerer extends Controller
{
    protected function my_validation($validation) {

        $validator = Validator::make(request()->all(), $validation);



        if($validator->fails()) {

            return ['status' => false, 'message' => $validator->errors()];

        }

        return ['status' => true];

    }


    protected function get_array_from_get_request($url) {

        try {

            $ch = curl_init();

            // Disable SSL verification

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            // Will return the response, if false it print the response

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Set the url

            curl_setopt($ch, CURLOPT_URL, $url);

            // Execute

            $result = curl_exec($ch);

            // Closing

            curl_close($ch);

            $response = json_decode($result, true);



            return $response;

        } catch(\Exception $e) {

            return response()->json([

                'status'  => false,

                'code'    => Response::HTTP_BAD_REQUEST,

                'message' => 'Login Session Expired.',

            ]);

        }

    }


    protected function google_signup() {

        $url = 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=' . request()->input('token');



        try {

            $json_data = $this->get_array_from_get_request($url);

        } catch(\Exception $e) {

            return response()->json([

                'status'  => false,

                'code'    => Response::HTTP_BAD_REQUEST,

                'message' => ['Bad request'],

            ], Response::HTTP_BAD_REQUEST);

        }


        if(array_key_exists('error_description', $json_data)) {

            throw new SocialLoginException($json_data['error_description']);

        }


        $google_client_id_for_android = '97264335721-a63pn3n64fn2ba2ogtddan7u6bfs66fi.apps.googleusercontent.com';

        $google_client_id_for_ios     = '97264335721-a63pn3n64fn2ba2ogtddan7u6bfs66fi.apps.googleusercontent.com';



        $is_verified['status'] = ($json_data['aud'] == $google_client_id_for_ios || $json_data['aud'] == $google_client_id_for_android) && ($json_data['email'] == request()->input('email'));

        $is_verified['from']   = 'google';



        return $is_verified;

    }


    protected function facebook_signup() {

        $login_token = request()->input('token');
        // accessing user data


        $url_to_access_user_detail = 'https://graph.facebook.com/me?fields=email&access_token=' . $login_token;

        try {

            $json_data_user = $this->get_array_from_get_request($url_to_access_user_detail);

        } catch(\Exception $e) {

            return response()->json([

                'status'  => false,

                'code'    => Response::HTTP_BAD_REQUEST,

                'message' => ['Login Session Expired.'],

            ], Response::HTTP_BAD_REQUEST);

        }





        if(array_key_exists('error', $json_data_user)) {

            throw new SocialLoginException($json_data_user['error']['message']);

        }


        // accessing app data

        $url_to_access_app_id = 'https://graph.facebook.com/app?access_token=' . $login_token;


        try {

            $json_data_app = $this->get_array_from_get_request($url_to_access_app_id);

        } catch(\Exception $e) {

            return response()->json([

                'status'  => false,

                'code'    => Response::HTTP_BAD_REQUEST,

                'message' => ['Login Session Expired.'],

            ], Response::HTTP_BAD_REQUEST);

        }

        if(array_key_exists('error', $json_data_app)) {

            throw new SocialLoginException($json_data_app['error']['message']);

        }






        $app_id_for_android = '227766851817314';//Facebook ko APP ID here

        $app_id_for_ios     = '227766851817314';



        $is_verified['status'] = ($json_data_app['id'] == $app_id_for_android || $json_data_app['id'] == $app_id_for_ios) && $json_data_user['email'] == request()->input('email');

        $is_verified['from']   = 'facebook';



        return $is_verified;

    }

    public function pestControlOrder($order_id , $data)
    {
        $orders = PestControlOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'treatment_for' =>json_encode($data['treatment_for']),
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],

        ]);

    }



    public function deepCleanOrder($order_id , $data)
    {
        $orders = DeepcleaningOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],

        ]);
    }

    public function paintOrder($order_id , $data)
    {
        $orders = PaintingOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'paint_type1' => $data['paint_type1'],
            'paint_type2' => $data['paint_type2'],
            'current_color' => $data['current_color'],
            'furnished' => $data['furnished'],
            'ceiling_paint' => $data['ceiling_paint'],
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],
            'comment' => $data['comment'],

        ]);
    }

    public function sanitizationOrder($order_id , $data)
    {
        $orders = SanitizationOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],

        ]);
    }


}
