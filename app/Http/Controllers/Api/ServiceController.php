<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PestControlTypeResource;
use App\Http\Resources\Api\ProviderDetailResource;
use App\Http\Resources\Api\ServiceProviderResource;
use App\Http\Resources\Api\ServiceResource;
use App\PestControlTreatmentType;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function services()
    {

        $services = Service::latest()->get();
        $data =[];

        /** @var To check if form for servove exit or not $service */
        foreach ($services as $service)
        {
            if(isFormExist($service->id)){
                $data[] =   $service;
            }
        }
        /**  */

        return ServiceResource::collection($data);

    }

    public function trendingService()
    {
        $trending = Service::where('trending',"on")->get();
        return ServiceResource::collection($trending);
    }

    public function search(Request $request)
    {
        $keyword = $request->query('keyword');

        $query = Service::
            where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                    ->orWhere('short_description', 'like', "%{$keyword}%");
            });

        return ServiceResource::collection($query->get());

    }
    public function getProviderDetail(Request $request)
    {

        $id = $request->query('provider_id');
        $provider = User::find($id);

        $provider = $provider->details;

        return ProviderDetailResource::collection(collect([$provider]));


    }

    public function getServiceProvider(Request $request)
    {

        $id = $request->query('service_id');
        $service = Service::find($id);

        $providers = $service->users;

//        return ServiceProviderResource::collection($providers);

        return new ServiceProviderResource($service);
    }

    public function getPestControlTypes()
    {
        $pest_control_types = PestControlTreatmentType::all();

        return PestControlTypeResource::collection($pest_control_types);
    }
}
