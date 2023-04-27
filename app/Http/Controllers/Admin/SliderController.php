<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use App\SliderText;
use Illuminate\Http\Request;

class SliderController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['slider'] = Slider::first();
        $this->data['slider_text'] = SliderText::all();
        return view('admin.slider',$this->data);
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
        //
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
        $slider = Slider::first();

        if($request->hasFile('image')){

            $oldfile = public_path().'/uploads/slider/'.$slider->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }


            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/slider/',$name);
            $slider->image=$name;

        }

        $slider->title = $request->title;
        $slider->save();



       for ($i=1 ;$i<4;$i++)
       {
           $string = 'text'.$i;
           $slider = SliderText::find($i);

           $slider->text = $request->$string;

           $slider->save();
       }


        return back()->with('message','Slider updated successfully .');
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
