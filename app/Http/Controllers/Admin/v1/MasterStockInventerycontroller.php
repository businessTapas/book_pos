<?php

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grn;
use App\Models\MasterStockInventery;
use App\Models\AdjustMasterStock;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Exception;
class MasterStockInventerycontroller extends Controller
{
    public $page = "Master Stock Inventery";
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $data = MasterStockInventery::with([
                'product',
                'storage_site',
                'storage_location',
                'rack',
                'store',
                'adjust_master_stock',
            ]);
           
            if (!isAdmin()) {
                $data->where('store_id', loginStore()->id);
            }
            
            $data = $data->get();
            //return $data;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {            
                    $actionBtn = view('admin.v1.master_stock_inventery.buttons', ['item' => $row, "route" => 'books', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('admin.v1.master_stock_inventery.index', compact('page'));
        
    }
    public function itemWiseStock(Request $request)
    {
        $page = $this->page;
        $login_id = auth()->user()->id;
        $publisher = User::where('id' , $login_id)->first();
        $data = Product::with('publisher')->where('deleted_at', null)->where('supplier_id', $publisher->parent_id)->orderByDesc('id')->get();
        if ($request->ajax()) {
            //$data = Product::with('publisher')->where('deleted_at', null)->orderByDesc('id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('lifetime_sale', function ($row) {
                    // Grn::where('product_id',$row->id)->where('store_id',loginStore()->id)->sum('')
                    return '100';
                })
                ->addColumn('total_stock', function ($row) {
                    return '100';
                })
                ->addColumn('availble_stock', function ($row) {
                    return    MasterStockInventery::where('product_id', $row->id)->where('store_id', loginStore()->id)->sum('qty');
                })
                ->addColumn('sale_price', function ($row) {
                    $result = MasterStockInventery::where('product_id', $row->id)->where('store_id', loginStore()->id)->first();
                    if ($result) {
                        return $result->sale_price;
                    } else {
                        // If there is no data, return 0
                        return 0;
                    }
                })
                ->addColumn('sale_stock', function ($row) {
                    return '100';
                })
                ->editColumn('status', function ($row) {
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.master_stock_inventery.buttons', ['item' => $row, "route" => 'gstslabs', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.master_stock_inventery.item_wise_stock', compact('page'));
    }

    public function adjust_stock( $stock_id)
    {
        
        $page = $this->page;
        $product_data = MasterStockInventery::with([
            'product',
            'storage_site',
            'storage_location',
            'rack',
            'store',
            'adjust_master_stock'
        ]);
       
            $product_data->where('id', $stock_id);        
        $product_data = $product_data->get();
        //return $product_data;
       
        return view('admin.v1.master_stock_inventery.adjust', compact('page', 'product_data'));
    }

    public function adjust_stock_update(Request $request)
    {
        $validate = Validator::make($request->all(), [
             'master_stock_inventeries_id' => 'required|string',
            'description' => 'required|string',
            'request_qty' => 'required',
            'sale_price' => 'required',
            'total_amount' => 'required', 
        ]);

        //return $request->all();
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $inventory = MasterStockInventery::where('id', $request->master_stock_inventeries_id)->first();
                //return $inventory;
                $inventory->update([
                    'qty' => $inventory->qty - $request->request_qty,
                    //'sale_price' => $request->sale_price,
                    
                ]);
                AdjustMasterStock::create([
                    'master_stock_inventeries_id' => $request->master_stock_inventeries_id,
                    'description' => $request->description,
                    'prev_qty' => $request->qty,
                    'adjust_qty' => $request->request_qty,
                    'prev_sale_price' => $request->price,
                    'adjust_sale_price' => $request->sale_price,
                    'adjust_amount' => $request->total_amount,
                    'created_by' => auth()->user()->id,
                    
                ]);
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }

    public function adjust_stock_show (Request $request, $stockid)
    {
        $stock_id = $stockid;
        $page = $this->page;
        if ($request->ajax()) {
            $data = AdjustMasterStock::with([
                'master_stock.product',            
                'master_stock',
            ])->where('master_stock_inventeries_id', $stockid)->get();
           
            //return $data;
            return DataTables::of($data)
            ->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; })
            ->addIndexColumn()
                ->addColumn('action', function ($row) {            
                    $actionBtn = view('admin.v1.master_stock_inventery.buttons', ['item' => $row, "route" => 'books', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
            return view('admin.v1.master_stock_inventery.adjust_list', compact('page','stock_id'));

      
    }
   
}
