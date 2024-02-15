<?php


namespace App\Http\Controllers\Admin\v1;

use App\Models\MannualGrn;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Dispatch;
use App\Models\GrnDetail;
use App\Models\MannualGrnDetails;
use App\Models\Product;
use App\Models\RequisitionDetails;
use App\Models\User;
use App\Models\Store;
use App\Models\StorageLocation;
use App\Models\Rack;
use App\Models\MasterStockInventery;
use App\Models\Purchase;
use App\Models\Requisition;
use Illuminate\Support\Facades\DB;

class MannualGrnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Good Receive Note';
    public function index(Request $request)
    {
        $page = $this->page;
        //if ($request->ajax()) 
        //{
            if (isAdmin()) {
                $data = MannualGrn::with(['store', 'supplier'])->where('deleted_at', null)->orderByDesc('id')->get();
            }

            if (isCentral()) {
                //$data = MannualGrn::with(['store', 'supplier'])->where('to_store', loginStore()->id)->where('deleted_at', null)->orderByDesc('id')->get();
                $data = MannualGrn::with(['store', 'supplier'])->where('store_id', loginStore()->id)->where('deleted_at', null)->orderByDesc('id')->get();
                //return $data;
            }
            if (isRetail()) {
                $data = MannualGrn::with(['store', 'supplier'])->where('store_id', loginStore()->id)->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isPublisher()) {
                $data = MannualGrn::with(['store', 'supplier'])->where('deleted_at', null)->where('supplier_id', auth()->user()->id)->orderByDesc('id')->get();
                return $data;
            }
            
            if ($request->ajax()) 
            {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.mannual_grn.buttons', ['item' => $row, "route" => 'grn', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.mannual_grn.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getStorageLocationOnSiteId(Request $request, $site_id = null)
    {
        // return $request->publisher_id;
        //$products =  Product::with('gst')->where('deleted_at', null)->where('supplier_id', $request->publisher_id)->where('title', 'like', '%' . $product . '%')->limit(50)->get();
        $products =  StorageLocation::where('deleted_at', null)->where('storage_site_id', $request->site_id)->limit(50)->get();
        //return $products;
        $data = [];
        /* foreach ($products as $p) {
            $master_stock_inventry = MasterStockInventery::where('product_id', $p->id)->where('storage_site_id', $request->storage_site_id)->where('store_id', loginStore()->id)->first();
            if (!empty($master_stock_inventry)) {
?>
                <option value="<?= $p->title ?>"><?= $p->title ?></option>
<?php }
        } */
        foreach ($products as $p) {
            $master_stock_inventry = MasterStockInventery::where('product_id', $p->id)->where('storage_site_id', $request->storage_site_id)->where('store_id', loginStore()->id)->first();
            if (!empty($master_stock_inventry)) {
                $data[]= $p->title;
            }
        }
        return $data;
    }

    public function create(Request $request)
    {
        $data['stores'] =  Store::where('deleted_at', null)->where('type', 'central-store')->get();
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['suppliers'] = User::where('id', auth()->user()->parent_id)->get();
        //return $data['suppliers'];
        //$data['products'] = Product::where('deleted_at', null)->get();
        $data['page'] = $this->page;
        $data['products'] = Product::where('deleted_at', null)->where('supplier_id', auth()->user()->parent_id)->get();
        $data['dispatches'] = Dispatch::where('deleted_at', null)->where('store_id', loginStore()->id)->orderByDesc('id')->get();
        $data['page'] = $this->page;

        return view('admin.v1.mannual_grn.insert', $data);
    }

    public function status($id)
    {
        $status = MannualGrn::find($id);
        if ($status->status == "active") {
            MannualGrn::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            MannualGrn::where('id', $id)->update(['status' => 'active']);
            return "Active";
        }
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
            // 'title' => 'required|string|unique:purchase,title',
        ]);


        if (isRetail()) {
            $request->merge([
                'supplier_id' => Store::find($request->to_store)->id
            ]);
        }
        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            // try {
                $request->merge([
                    'store_id' => loginStore()->id,
                    'created_by' => auth()->user()->id,
                    'grn_date' => date('Y-m-d'),
                ]);

           

                $grn =  MannualGrn::create($request->except(['_token', 'products', 'request_qty', 'mrp_price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'array_taxeble_amount', 'array_total_amount']));

                if (count($request->products) > 0) {
                    for ($i = 0; $i < count($request->products); $i++) {
                        $data = [
                            'mannual_grn_id' => $grn->id,
                            'product_id' => $request->products[$i],
                            'price' => $request->price[$i],
                            'sale_price' => $request->sale_price[$i],
                            'request_qty' => $request->request_qty[$i],
                            'total_amount' => $request->array_total_amount[$i],
                            'storage_site_id' => $request->storage_site_id[$i],
                            'storage_location_id' => $request->storage_location_id[$i],
                            'rack_id' => $request->rack_id[$i],
                            'batch_no' => $request->batch_no[$i],
                            'updated_at' => date('Y-m-d h:i:s')
                        ];
                        MannualGrnDetails::create($data);
                        $this->masterStockManage($data);
                    }
                }
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            // } catch (Exception $e) {
            //     return response()->json(['error' => $e->getMessage()]);
            // }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores =  Store::where('deleted_at', null)->where('type', 'central-store')->get();
        $brands = Brand::where('deleted_at', null)->get();
        $suppliers = User::where('type', 'publisher')->get();
        $products = Product::where('deleted_at', null)->get();
        $page = $this->page;
        $data = MannualGrn::with('details')->where('deleted_at', null)->where('id', $id)->first();
        return view('admin.v1.grn.edit', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            // 'title' => 'required|string|unique:purchase,title',
        ]);

        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        }
        try {
            $request->merge([
                'store_id' => loginStore()->id,
                'created_by' => auth()->user()->id,
                'requisition_date' => date('Y-m-d'),
            ]);



            MannualGrn::where('id', $id)->update($request->except(['_method', '_token', 'products', 'request_qty', 'price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'array_taxeble_amount', 'array_total_amount', 'array_tax_amount', 'tatal_tax']));
            if (count($request->products) > 0) {
                RequisitionDetails::where('requisition_id', $id)->delete();
                for ($i = 0; $i < count($request->products); $i++) {
                    RequisitionDetails::create([
                        'requisition_id' => $id,
                        'product_id' => $request->products[$i],
                        'price' => $request->price[$i],
                        'request_qty' => $request->request_qty[$i],
                        'dispatch_qty' => $request->request_qty[$i],
                        'received_qty' => $request->request_qty[$i],
                        'tax_amount' => $request->array_tax_amount[$i],
                        'taxeble_amount' => $request->array_taxeble_amount[$i],
                        'total_amount' => $request->array_total_amount[$i],
                        'purchase_price' => $request->purchase_price[$i],
                        'sale_price' => $request->sale_price[$i],
                        'batch_no' => $request->batch_no[$i],
                        'cgst' => $request->array_cgst[$i],
                        'sgst' => $request->array_igst[$i],
                        'igst' => $request->array_igst[$i],
                        'updated_at' => date('Y-m-d h:i:s')
                    ]);
                }
            }
            return response()->json(['success' => $this->page . " SuccessFully Updated "]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            MannualGrn::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
    public function search($product)
    {
        $products =  Product::where('deleted_at', null)->where('title', 'like', '%' . $product . '%')->limit(50)->get();

        foreach ($products as $p) { ?>
            <option value="<?= $p->title ?>"></option>
<?php }
    }

    function productPrice($product_id = null)
    {
        $data = Product::find($product_id);
        return $data;
    }

    public function get_purchase($dispatch_no = null)
    {

        if (empty($dispatch_no)) {
            return '<div class="alert alert-danger" role="alert">
                       Please Enter the Dispatch order number
            </div>';
        }
        $data['data'] = Dispatch::with([ 'details', 'details.product','store', 'supplier', 'to_store'])->where('deleted_at', null)->where('dispatch_no', $dispatch_no)->first();
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['products'] = Product::where('deleted_at', null)->get();
        $data['page'] = $this->page;
        //return $data['data'];
        if (empty($data['data'])) {
            return '<div class="alert alert-warning" role="alert">
                   Please Check you Dispatch order number 
                   </div>';
        }
        return view('admin.v1.grn.get_grn', $data);
    }

    public function masterStockManage($dispatch_datails)
    {
        $inventry =  MasterStockInventery::where('store_id', auth()->user()->store_id)
            ->where('product_id', $dispatch_datails['product_id'])
            ->where('storage_site_id', $dispatch_datails['storage_site_id'])
            ->where('storage_location_id', $dispatch_datails['storage_location_id'])
            ->where('rack_id', $dispatch_datails['rack_id'])
            ->where('batch_no', $dispatch_datails['batch_no'])
            ->first();
        if (!empty($inventry)) {
            $inventry->update([
                'qty' => $inventry->qty + $dispatch_datails['request_qty'],
                'purchase_price' => $dispatch_datails['price'],
                'sale_price' => $dispatch_datails['sale_price'],
            ]);
        } else {
            MasterStockInventery::create([
                'product_id' => $dispatch_datails['product_id'],
                'store_id' => loginStore()->id,
                'storage_site_id' => $dispatch_datails['storage_site_id'],
                'storage_location_id' => $dispatch_datails['storage_location_id'],
                'rack_id' => $dispatch_datails['rack_id'],
                'qty' => $dispatch_datails['request_qty'],
                'purchase_price' => $dispatch_datails['price'],
                'sale_price' => $dispatch_datails['sale_price'],
                'supplier_price' => $dispatch_datails['price'],
                'discount_amount' => $dispatch_datails['discount_amount'] ?? 0,
                'batch_no' => $dispatch_datails['batch_no'],
            ]);
        }
    }
}
