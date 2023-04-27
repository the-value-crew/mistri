<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LogoRequest;
use App\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::latest()->get();
        return view('admin.logo.create',compact('logos'));
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
    public function store(LogoRequest $request)
    {
        $logo = new Logo();

        if($request->hasFile('logo')){

            $file=$request->file('logo');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/logo/',$name);
            $logo->logo=$name;

        }

        $logo->save();
        return back()->with('message','Logo added successfully .');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = Logo::find($id);

        $oldfile = public_path().'/uploads/logo/'.$logo->logo;
        if(\File::exists($oldfile)){
            \File::delete($oldfile);
        }

        $logo->delete();
    }
}
