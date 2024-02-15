<?php

namespace App\Http\Controllers\Admin\v1;

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\MasterStockInventery;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Requisition;
use App\Models\RequisitionDetails;
use App\Models\User;
use App\Models\Store;
use App\Models\StorageSite;
use Illuminate\Support\Carbon;


class TransfersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page = "All Transfers";
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $data = MasterStockInventery::with([
                'product',
                'transfer_site.storage_site',
                'storage_site',
                'storage_location',
                'rack',
                'store'
            ]);
            if (!isAdmin()) {
                $data->where('store_id', loginStore()->id)->whereNotNull('transfer_from_id');
            }
            $data = $data->get();
            //return $data;
            return Datatables::of($data)
                ->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.product.buttons', ['item' => $row, "route" => 'books', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.transfer.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $stores =  Store::where('deleted_at', null)->where('type', 'central-store')->get();
        $brands = Brand::where('deleted_at', null)->get();
        $storage_site = StorageSite::where('store_id', loginStore()->id)->get();
        $page = $this->page;
        $product_data = MasterStockInventery::with('product');
            
         if (!isAdmin()) {
            $product_data->where('store_id', loginStore()->id);
        } 
        $product_data = $product_data->get();
        //return $product_data[0]->product;
       
        return view('admin.v1.transfer.insert', compact('page', 'brands', 'stores', 'storage_site', 'product_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
             'product_id' => 'required|string',
            'transfer_from_id' => 'required|string',
            'batch_no' => 'required|string',
            'storage_site_id' => 'required|string',
            'storage_location_id' => 'required|string', 
            'rack_id' => 'required|string'
        ]);

        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $inventory = MasterStockInventery::where('store_id', loginStore()->id)->where('product_id', $request->product_id)->where('batch_no', $request->batch_no)->first();
                //return $inventory;
                $inventory->update([
                    'qty' => $inventory->qty - $request->request_qty,
                ]);
                MasterStockInventery::create([
                    'product_id' => $request->product_id,
                    'store_id' => loginStore()->id,
                    'storage_site_id' => $request->storage_site_id,
                    'storage_location_id' => $request->storage_location_id,
                    'rack_id' => $request->rack_id,
                    'purchase_price' => $inventory->purchase_price,
                    'sale_price' => $inventory->sale_price,
                    'supplier_price' => $inventory->supplier_price,
                    'qty' =>  $request->request_qty,
                    'batch_no' => $inventory->batch_no,
                    'discount_amount' =>  0,
                    'transfer_from_id' => $inventory->id,
                ]);
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }

    public function gatWarehouseOnProdutid(Request $request) {
       // return $request->productId;
        $storagesite = MasterStockInventery::with('storage_site')->where('store_id', loginStore()->id);
        if($request->productId != '') {
            $storagesite->where('product_id', $request->productId);
        }
        if($request->batch_no != '') {
            $storagesite->where('batch_no', $request->batch_no);
        }
        $storage_site = $storagesite->get();
        $return_data = array("message" => "Storage site data", "data"=>$storage_site,"status" => "success");
        //return $return_data[0]->data;
        return json_encode($return_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
