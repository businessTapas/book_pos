<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerGroup;

class CustomergroupController extends Controller
{
   
    public function index()
    {
        $cgroup=CustomerGroup::all();
        return view('admin.v1.customergroup.index', compact('cgroup'));
    }
    public function add() 
    {
        return view('admin.v1.customergroup.add');
    }
    public function cgroup_add(Request $request)
    {
        $cgroup=new CustomerGroup;
        $cgroup->name = $request['name'];
        $cgroup->description = $request['description'];
        $cgroup->status = $request['status'];
        $cgroup->save();
        return redirect('/customer-group/index');
    }

    public function delete($id)
    {
        $cgroup=CustomerGroup::where('id',$id);

        if(!is_null($cgroup))
        {
            $cgroup->delete();
        }
        return redirect()->back();
    }
    public function cgroup_edit($id)
    {
        $edit =CustomerGroup::where('id',$id)->first();
        return view('admin.v1.customergroup.edit', compact('edit'));
    }
    public function cgroup_update(Request $request,$id)
    {
        CustomerGroup::where('id',$id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        return redirect()->route('cgroup.index');
    }
}
