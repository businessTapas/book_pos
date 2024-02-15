<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DiscountController extends Controller
{
    public $page = "Discount";
    public function index(Request $request)
    {
        $data = Discount::get();
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.gst_slab.buttons', ['item' => $row, "route" => 'gstslabs', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $page = $this->page;
        return view('admin.v1.discount.index', compact('page'));
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'discount' => 'required',
            'min' => 'required',
            'coupon_code' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        } else {
            $request->request->add(['created_by' => auth()->user()->id]);
            $data =  Discount::create($request->except('_token'));
            if ($data) {
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } else {
                return response()->json(['error' => "something went wrong"]);
            }
        }
    }
}
