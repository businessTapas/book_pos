<?php

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\Controller;


class SettingController extends Controller
{
    public $page_name = 'Setting';
    public function index()
    {
        return view('setting.index', ['data' =>  Setting::get(), 'page' => $this->page_name]);
    }

    public function save(Request $request)
    {
        Setting::insert($request->except('_token'));
        return redirect('Setting/list')->with('store', $this->page_name . ' Added Successfully !!! ');
    }

    public function edit($id)
    {
        $companies = Setting::where('id', $id)->first();
        return view('setting.edit', ['companies' => $companies, 'page' => $this->page_name]);
    }

    public function show($id)
    {
    }
    public function update(Request $request, $id)
    {
        Setting::where('id', $id)->update($request->except(['_method', "_token"]));
        if ($request->hasFile('icon')) {
            $this->update_images('settings',$id,$request->file('icon'),'setting','icon');
        }
        if ($request->hasFile('logo')) {
            $this->update_images('settings',$id,$request->file('logo'),'setting','logo');
        }
        return response()->json(['success'=> $this->page_name . ' Updated Successfully !!! ']);
    }

    public function destroy($id)
    {
        $companies = Setting::where('id', $id)->first();
        $companies->delete();
        return redirect('Setting/list')->with('delete', $this->page_name . ' Deleted Successfully !!! ');
    }
}
