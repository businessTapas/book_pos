<?php

namespace App\Http\Controllers;

use App\Models\AppInfo;
use App\Models\CompanyInfo;
use App\Models\Finance;
use App\Models\ApiKey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $app_setting = AppInfo::first();
        return view('admin.v1.setting.add',compact('app_setting'));
    }
    
    public function store(Request $request)
    { 
        if($request->id == null)
        {
            $appinfo= new AppInfo();
        }
        else
        {
            $appinfo = AppInfo::find($request->id);
        }

        $fullPath = null;
        $dark_logo = null;
        $fav_icon = null;
        
        $validator = Validator::make($request->all(), [
            'app_logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'dark_logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'fab_icon' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else
        {
            if($validator->passes())
            {
                if ($request->hasFile('app_logo')) {
                    $imageName = time() . '.' . $request->file('app_logo')->extension();
                    $request->app_logo->move(public_path('images/company'), $imageName);
                    $fullPath = 'images/company/' . $imageName;
                }

                if($request->hasFile('dark_logo')){
                    $dark_logo ='abfjiheruueru' . '.' . $request->file('dark_logo')->extension();
                    $request ->dark_logo->move(public_path('images/company'),$dark_logo);
                    $dark_logo = 'images/company/' . $dark_logo;
                }
  
                if ($request->hasFile('fab_icon')) {
                    $fav_icon = 'kjjjjrhquyqq4r34r' . '.' . $request->file('fab_icon')->extension();
                    $request->fab_icon->move(public_path('images/company'), $fav_icon);
                    $fav_icon = 'images/company/' . $fav_icon;
                }
            }

            $appinfo->title = $request->app_title;
            $appinfo->description = $request->app_description;
            $appinfo->version = $request->app_version;
            $appinfo->beta_url = $request->beta_url;
            $appinfo->playstore_url = $request->playstore_url;
            $appinfo->appstore_url = $request->appstore_url;
            if($dark_logo!=null){
                $appinfo->dark_logo = $dark_logo;
            }
            if($fav_icon!=null){
                $appinfo->fav_icon = $fav_icon;
            }
            if($fullPath!=null){
                $appinfo->logo = $fullPath;
            }
            $appinfo->save();

            if ($appinfo) {
                Session::flash('message', "Settings data are updated successfully.");
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', "Something is wrong to update settings data.");
                Session::flash('alert-class', 'alert-danger');
            }

            return redirect()->back();

        }

    }

    public function view()
    {
        $c_info = CompanyInfo::first();
        return view('admin.v1.setting.company_info',compact('c_info'));
    
    }

    public function load(Request $request)
    {
        if ($request->id == null) {
            $c_info = new CompanyInfo();
         
        } else {
            $c_info = CompanyInfo::find($request->id);
        }

        $validator = Validator::make($request->all(), [
            'c_logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            // 'gst' => 'required|numeric|digits:15',
        ]);

        $fullPath = null;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            if ($validator->passes()) {
                if ($request->hasFile('c_logo')) {
                    $imageName = time() . '.' . $request->file('c_logo')->extension();
                    $request->c_logo->move(public_path('images/company'), $imageName);
                    $fullPath = 'images/company/' . $imageName;
                }
            }

            $c_info->company_name = $request->c_name;
            $c_info->address = $request->c_address;
            $c_info->city = $request->city;
            $c_info->state = $request->state;
            $c_info->country_name = $request->country_name;
            $c_info->phone = $request->phone;
            $c_info->email = $request->email;
            $c_info->gst_number = $request->gst;
            $c_info->company_header = $request->header;
           
            if($fullPath!=null){
                $c_info->company_logo = $fullPath;
            }
            $c_info->save();

            if ($c_info) {
                Session::flash('message', "Company data are updated successfully.");
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', "Something is wrong to update settings data.");
                Session::flash('alert-class', 'alert-danger');
            }

            return redirect()->back();
        }
    }


    public function show()
    {
        $finance = Finance::first();
        return view('admin.v1.setting.finance',compact('finance'));
    }

    public function store_data(Request $request)
    {
        if ($request->id == null) {
            $finance = new Finance();
         
        } else {
            $finance = Finance::find($request->id);
        }

        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'bank_account' => 'required',
            'terms_condition' => 'required',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $finance->curreency = $request->currency;
            $finance->bank_accounts = $request->bank_account;
            $finance->terms_condition = $request->terms_condition;

            $finance->save();
            
            if ($finance) {
                Session::flash('message', "Company data are updated successfully.");
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', "Something is wrong to update settings data.");
                Session::flash('alert-class', 'alert-danger');
            }

            return redirect()->back();
        }

    }


    public function view_data()
    {
        $api_setting = ApiKey::first();
        return view('admin.v1.setting.api_key',compact('api_setting'));
    
    }

    public function post_data(Request $request)
    {
        if ($request->id == null) {
            $api_setting = new ApiKey();
         
        } else {
            $api_setting = ApiKey::find($request->id);
        }

        $api_setting->api_key = $request->s_key;
        $api_setting->google_key = $request->google_key;

        $api_setting->save();

        if ($api_setting) {
            Session::flash('message', "Company data are updated successfully.");
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', "Something is wrong to update settings data.");
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->back();
    }



    public function show_data()
    {
        //$setting = Setting::get();
        return view('admin.v1.setting.miscellaneus',compact('setting'));
    
    }
}
