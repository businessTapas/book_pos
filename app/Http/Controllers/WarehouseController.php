<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\District;
use App\Models\Publisher;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
class WarehouseController extends Controller
{
    public function index()
    {
        $warehouse = Warehouse::with('district')->get();
        return view('admin.v1.warehousemanagement.index',compact('warehouse'));
    }
    public function  add()
    {
        $products = Product::all();
        $district =  District::all();
        $publisher = Publisher::all();
        return view('admin.v1.warehousemanagement.add',compact('products','district','publisher'));
    }
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'name' => 'required',
           'address'=>'required',
           'description'=> 'required',
           'product_id'=>'required',
           'publisher_id' => 'required',
           'district_id' => 'required',
           'email' => 'required|string|unique:users,email',
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
       if($validator->fails())
       {
         return redirect()->back()->withErrors($validator)->withInput();
       }
    
       $data =  new Warehouse();
       $data->name = $request->name;
       $data->address = $request->address;
       $data->description= $request->description;
       $data->product_id = $request->product_id;
       $data->publisher_id = $request->publisher_id;
       $data->district_id = $request->district_id;
       $data->save();

       $entity = new User();
       $entity->name = $request->name;
       $entity->email = $request->email;
       $entity->password = $request->password;
       $entity->type = "publisher";
       $entity->save();

        // $data = $request->all();
        // $data['name'] = $request->name;
        // $data['address'] = $request->address;
        // $data['description'] = $request->description;
        // $data['product_id'] = $request->product_id;
        // $data['publisher_id'] = $request->publisher_id;
        // $data['district_id'] = $request->district_id;
        //  Warehouse::create($data);
        return redirect()->route('admin.list.ware')->with('success','Added successfully');
    }

    public function edit($id)
    {
        $edit= Warehouse::where('id',$id)->first();
        return view('admin.v1.warehousemanagement.edit',compact('edit'));
    }
    public function update(Request $request,$id)
    {
        Warehouse::where('id',$id)->update([
            'name'=> $request->name,
            'address'=> $request->address,
            'description'=> $request->description,
            'product_id'=>$request->product_id,
            'publisher_id'=> $request->publisher_id,
            'district_id' =>$request->district_id,
        ]);
        return redirect()->route('admin.list.ware')->with('update','update successfully');
    }
}