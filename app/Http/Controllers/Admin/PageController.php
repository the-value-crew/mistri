<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Page;
use Illuminate\Http\Request;

class PageController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
       return view('admin.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('admin.page.create',compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page();

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/page/',$name);
            $page->image=$name;

        }
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->description = $request->description;
        $page->save();
        return back()->with('message','Page created successfully .');
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
        $this->data['page']= Page::find($id);
        return view('admin.page.create',$this->data);

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
        $page = Page::find($id);

        if($request->hasFile('image')){

            $oldfile = public_path().'/uploads/page/'.$page->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }


            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/page/',$name);
            $page->image=$name;

        }
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->description = $request->description;
        $page->save();
        return back()->with('message','Page updated successfully .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);

        $oldfile = public_path().'/uploads/page/'.$page->image;
        if(\File::exists($oldfile)){
            \File::delete($oldfile);
        }

        $page->delete();
        return back();
    }
}
