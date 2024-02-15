<?php

namespace App\Http\Controllers\admin\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BillController extends Controller
{
    public function bill()
    {
        $id = auth()->user()->id;
        $bill = User::with('store.district')->where('id',$id)->get();
        // return $bill;
        return view('',compact('bill'));

    }
}
