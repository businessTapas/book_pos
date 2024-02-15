<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\MasterStockInventery;
use App\Models\AdjustMasterStock;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Validator;
use Exception;

class AdjustMasterStockController extends Controller
{
    public $page = "All Transfers";
    public function index(Request $request)
    {
        $page = $this->page;
        
        if ($request->ajax()) {
                $data = AdjustMasterStock::with(
                    'master_stock.product',
                    'master_stock',
                )->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.v1.adjustment.adjustment', compact('page'));
    }
}
