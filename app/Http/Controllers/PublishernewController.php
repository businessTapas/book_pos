<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Publisher;
use App\Models\District;
class PublishernewController extends Controller
{
    public function index()
    {
        $id=auth()->user()->id;
        $publishers= User::with('publisher')->where('id', $id)->get();
        return view('admin.v1.publishernew.index',compact('publishers'));
    }

    public function edit($id)
    {
        $edit = Publisher::where('id',$id)->first();
        $dis = District::all();
        return view('admin.v1.publishernew.edit',compact('edit','dis'));
    }

    public function update(Request $request,$id)
    {
         Publisher::where('id',$id)->update([
            'store_name' => $request->store_name,
            'address' =>$request->address,
            'description'=>$request->description,
            'district_id' =>$request->district_id,

          
        ]);
        return redirect()->route('publisher.view')->with('update','update successfull');
    }
}
