<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TranferController extends Controller
{
    public function index()
    {
        return view('admin.v1.tranfer.add');
    }
}
