<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InputTpye;
use App\ServiceCategory;
use App\ServiceField;
use Illuminate\Http\Request;

class ServiceFieldController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceField::distinct('service_category_id')->pluck('service_category_id');

        return view('admin.serviceField.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = ServiceCategory::all();
        $this->data['input_types']= InputTpye::all();
        $this->data['edit'] = false;
        return view('admin.serviceField.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = new ServiceField();
        $field->service_category_id = $request->service_category_id;
        $field->input_type_id = $request->input_type;
        $field->required = $request->required;
        $field->label = $request->label;
        $field->options = $request->options;
        $field->save();

        return back()->with('message','Service field added successfully');
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
        $this->data['fields'] = ServiceField::where('service_category_id',$id)->get();
        $this->data['input_types']= InputTpye::all();
        $this->data['service_category'] = ServiceCategory::where('id',$id)->first();
        $this->data['edit'] = true;

        return view('admin.serviceField.edit',$this->data);
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

        $field = new ServiceField();
        $field->service_category_id = $id;
        $field->input_type_id = $request->input_type;
        $field->required = $request->required;
        $field->label = $request->label;
        $field->options = $request->options;
        $field->save();

        return back()->with('message','Service field added successfully');
    }

    public function updateField(Request $request,$id)
    {
        $input_field = ServiceField::find($id);
        $input_field->label = $request->label;
        $input_field->options = $request->options;
        $input_field->save();
        return response()->json(['success'=>'Field updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = ServiceField::where('service_category_id',$id)->get();

        foreach ($services as $service)
        {
            $service = ServiceField::find($service->id);
            $service->delete();
        }

        return back();
    }

    public function deleteField($id)
    {
        $input_field = ServiceField::find($id);
        $input_field->delete();
        return back();
    }
}
