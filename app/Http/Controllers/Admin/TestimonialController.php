<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('admin.testimonial.create',compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $testimonial = new Testimonial();

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/testimonial/',$name);
            $testimonial->image=$name;

        }
        $testimonial->title = $request->title;
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->save();
        return back()->with('message','Testimonial created successfully .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['edit']=true;
        $this->data['testimonial']= Testimonial::find($id);
        return view('admin.testimonial.create',$this->data);
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
        $testimonial = Testimonial::find($id);

        if($request->hasFile('image')){

            $oldfile = public_path().'/uploads/testimonial/'.$testimonial->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/testimonial/',$name);
            $testimonial->image=$name;

        }
        $testimonial->title = $request->title;
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->save();
        return back()->with('message','Testimonial updated successfully .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        $oldfile = public_path().'/uploads/testimonial/'.$testimonial->image;
        if(\File::exists($oldfile)){
            \File::delete($oldfile);
        }

        $testimonial->delete();
        return back();
    }
}
