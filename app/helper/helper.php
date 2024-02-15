<?php

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

function get_admin_role($type)
{
    $data =  DB::table('roles')->where('type', $type)->where('name', 'admin')->first();
    return $data->id ?? '';
}

function loginStore()
{
    $data = DB::table('stores')->find(auth()->user()->store_id);
    return $data;
}

function isAdmin()
{
    if (auth()->user()->type == "admin") {
        return true;
    } else {
        return false;
    }
}
function isPublisher()
{
    if (auth()->user()->type == "publisher") {
        return true;
    } else {
        return false;
    }
}
function isCentral()
{
    if (auth()->user()->type == "central-store") {
        return true;
    } else {
        return false;
    }
}
function isRetail()
{
    if (auth()->user()->type == "retail-store") {
        return true;
    } else {
        return false;
    }
}

 function setting()
{
  $setting = Setting::get('value');
   return [
       'value_footer_right' => $setting[0]->value?? '',
        'value_footer_left' => $setting[1]->value ?? '',

  ]; 
  //return $setting[0]->value;
}
// {{quickreport()['customer']}}