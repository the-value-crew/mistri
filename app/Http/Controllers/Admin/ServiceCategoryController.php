<?php

namespace App\Http\Controllers\Admin;

use App\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = ServiceCategory::where('parent_id',null)->orderBy('priority')->get();
        return view('admin.serviceCategory.index' , $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = ServiceCategory::where('parent_id',null)->get();
        $this->data['edit'] = false;
        return view('admin.serviceCategory.create',$this->data);
    }

    public function createSubCategory()
    {
        $this->data['categories'] = ServiceCategory::where('parent_id',null)->get();
        $this->data['edit'] = false;
        return view('admin.serviceCategory.createSubCategory',$this->data);

    }

    public function create_subcategory($id)
    {
        $this->data['categories'] = ServiceCategory::where('parent_id',null)->get();
        $this->data['edit'] = false;
        $this->data['id'] = $id;

        return view('admin.serviceCategory.create_subcategory',$this->data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'image'=>'required|mimes:jpeg,jpg,png',
            'slug' => 'required',
            'name'=>'required',
            'priority'=>'sometimes|unique:service_categories,NULL'
        ));

        $category = new ServiceCategory();

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/servicecategory/',$name);
            $category->image=$name;

        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->priority = $request->priority;
        $category->parent_id = $request->category_id;

        if($request->feature){
            $category->feature = $request->feature;
        }else{
            $category->feature = 'off';
        }

        $category->save();

        return back()->with('message','Service category created successfully');


    }

    public function storeSubCategory(Request $request)
    {
        $category = new ServiceCategory();

        $this->validate($request, array(
            'image'=>'required|mimes:jpeg,jpg,png',
            'slug' => 'required',
            'name'=>'required',
            'category_id'=>'required'
        ));

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/servicecategory/',$name);
            $category->image=$name;

        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->priority = $request->priority;
        $category->parent_id = $request->category_id;

        if($request->feature){
            $category->feature = $request->feature;
        }else{
            $category->feature = 'off';
        }
        $category->save();
        return redirect(route('service-category.show',$request->category_id))->with('message','Service sub-category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['cat'] = ServiceCategory::find($id);
        $this->data['categories'] = ServiceCategory::where('parent_id',$id)->orderBy('priority')->get();
        return view('admin.serviceCategory.subcategory_index' , $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['edit'] = true;
        $this->data['categories'] = ServiceCategory::where('parent_id',null)->get();
        $this->data['cat'] = ServiceCategory::find($id);
        return view('admin.serviceCategory.edit',$this->data);

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

        $this->validate($request, array(
            'slug' => 'required',
            'name'=>'required',
//            'category_id'=>'required'
        ));


        $category = ServiceCategory::find($id);
        if($request->hasFile('image')){

            $oldfile = public_path().'/uploads/servicecategory/'.$category->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();

            $file->move(public_path().'/uploads/servicecategory/',$name);
            $category->image=$name;

        }

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->priority = $request->priority;

        if($category->parent_id != null)
        {
            $category->parent_id = $request->category_id;
        }

        if($request->feature){
            $category->feature = $request->feature;
        }else{
            $category->feature = 'off';
        }


        $category->save();

        return back()->with('message','Service category updated successfully');
    }


    public function changestatus($id)
    {
        $category = ServiceCategory::find($id);

        if($category->feature == "on")
        {
            $category->feature = "off";
        }
        else{
            $category->feature = "on";
        }

        $category->save();

        return response()->json(['message'=>'Service Category status updated successfully .']);
    }

    public function changepriority($value , $id, Request $request)
    {
        $category = ServiceCategory::find($id);

        $ids = ServiceCategory::pluck('priority')->toArray();

        if(in_array($value,$ids)){

            return response()->json(['message1'=>'Service Category has already been taken .']);
        }else{

            $category->priority = $value;
            $category->save();
            return response()->json(['message'=>'Service Category priority updated successfully .']);

        }





    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ServiceCategory::find($id);

        $oldfile = public_path().'/uploads/servicecategory/'.$category->image;
        if(\File::exists($oldfile)){
            \File::delete($oldfile);
        }

        if(count($category->children) >0)
        {
            foreach ($category->children as $child)
            {
                $oldfile = public_path().'/uploads/servicecategory/'.$child->image;
                if(\File::exists($oldfile)){
                    \File::delete($oldfile);
                }

                $child->delete();
            }
        }

        $category->delete();

    }
}
