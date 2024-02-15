<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function insert_image($image, $folder)
    {
        //return $folder;
        $destinationPath = 'upload/' . $folder . '/';
        $image_name = time() . "_" . $image->getClientOriginalName();
        $image->move($destinationPath, $image_name);
        return $destinationPath.$image_name;
    }
    function update_images($table_name, $id, $image, $folder, $column_name = "image")
    {
        $destinationPath = 'upload/' . $folder . '/';
        $image_name = DB::table($table_name)->find($id);
        if ($image_name->$column_name == '') {
            $image_name = time() . "_" . $image->getClientOriginalName();
        } else {
            $data=explode("/",$image_name->$column_name);
            $image_name=end($data);
        }
        DB::table($table_name)->where('id', $id)->update([$column_name => $destinationPath.$image_name]);
        $image->move($destinationPath, $image_name);
    }
    
}
