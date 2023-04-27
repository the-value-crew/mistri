<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ServiceCategoryResource;
use App\ServiceCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $categories = ServiceCategory::where('parent_id',null)->whereHas('services')->get();
        return ServiceCategoryResource::collection($categories);
    }

    public function subCategory($id)
    {
        $categories = ServiceCategory::where('parent_id',$id)->whereHas('services')->get();
        return ServiceCategoryResource::collection($categories);
    }
}
