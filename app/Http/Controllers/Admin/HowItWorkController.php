<?php

namespace App\Http\Controllers\Admin;

use App\HowItWork;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowItWorkController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['datas'] = HowItWork::latest()->get();
      return view('admin.howItWork.index',$this->data);
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
        $this->data['data'] = HowItWork::find($id);
        return view('admin.howItWork.edit',$this->data);
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
        $data = HowItWork::find($id);

        if($request->hasFile('image')){

            $oldfile = public_path().'/uploads/how-it-work/'.$data->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }


            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/how-it-work/',$name);
            $data->image=$name;

        }
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return back()->with('message','Updated successfully .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
