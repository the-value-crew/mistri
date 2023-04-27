<?php

namespace App\Http\Controllers\Api;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ServiceFieldResource;
use App\Http\Resources\Api\ServiceResource;
use App\Service;
use App\ServiceCategory;
use Illuminate\Http\Request;

class ServiceFieldController extends Controller
{
    public function fields(Request $request)
    {
        $id = $request->query('service_id');

        $service = Service::find($id);
        $response = ServiceFieldResource::collection(collect([$service]));
        return $response->additional([
            'status' => true,
            'code'   => Response::HTTP_OK,
        ])->response()->setStatusCode(Response::HTTP_OK);

    }

    public function serviceByCategory(Request $request)
    {
        $category_id = $request->query('category_id');
        $service_category = ServiceCategory::find($category_id);
        $services = $service_category->services;
        return ServiceResource::collection($services);

    }


}
