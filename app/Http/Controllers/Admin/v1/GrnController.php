<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\Grn;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Dispatch;
use App\Models\GrnDetail;
use App\Models\Product;
use App\Models\RequisitionDetails;
use App\Models\User;
use App\Models\Store;
use App\Models\MasterStockInventery;
use Database\Seeders\MasterStockerSeeder;
use App\Models\Purchase;
use App\Models\Requisition;
use Illuminate\Support\Facades\DB;

class GrnController extends Controller
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
        if ($request->ajax()) {
            if (isAdmin()) {
                $data = Grn::with(['store', 'supplier'])->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isCentral()) {
                $data = Grn::with(['store', 'supplier'])->where('to_store', loginStore()->id)->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isRetail()) {
                $data = Grn::with(['store', 'supplier'])->where('store_id', loginStore()->id)->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isPublisher()) {
                $data = Grn::with(['store', 'supplier'])->where('deleted_at', null)->where('supplier_id', auth()->user()->id)->orderByDesc('id')->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.grn.buttons', ['item' => $row, "route" => 'grn', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.grn.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $data['stores'] =  Store::where('deleted_at', null)->where('type', 'central-store')->get();
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['suppliers'] = User::where('type', 'publisher')->get();
        $data['products'] = Product::where('deleted_at', null)->get();
        $data['page'] = $this->page;
        $data['products'] = Product::where('deleted_at', null)->get();
        $data['dispatches'] = Dispatch::where('deleted_at', null)->where('store_id', loginStore()->id)->orderByDesc('id')->get();
        $data['page'] = $this->page;

        return view('admin.v1.grn.insert', $data);
    }

    public function status($id)
    {
        $status = Grn::find($id);
        if ($status->status == "active") {
            Grn::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Grn::where('id', $id)->update(['status' => 'active']);
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

        if (isCentral()) {
            $request->merge([
                'to_store' => loginStore()->id
            ]);
        }
        if (isRetail()) {
            $request->merge([
                'supplier_id' => Store::find($request->to_store)->id
            ]);
        }
        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->merge([
                    'store_id' => loginStore()->id,
                    'created_by' => auth()->user()->id,
                    'grn_date' => date('Y-m-d'),
                ]);

                $purchase =  Purchase::where('po_no', $request->po_no)->first();
                DB::beginTransaction();
                Requisition::where('requisition_no', $purchase->requisition_no)->update([
                    'status' => 'GRN Generated'
                ]);

                $grn =  Grn::create($request->except(['_token', 'products', 'request_qty', 'mrp_price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'array_taxeble_amount', 'array_total_amount']));

                if (count($request->products) > 0) {
                    for ($i = 0; $i < count($request->products); $i++) {
                        $data = [
                            'grn_id' => $grn->id,
                            'product_id' => $request->products[$i],
                            'price' => $request->price[$i],
                            'request_qty' => $request->request_qty[$i],
                            'dispatch_qty' => $request->request_qty[$i],
                            'received_qty' => $request->request_qty[$i],
                            'tax_amount' => $request->array_tax_amount[$i],
                            'taxeble_amount' => $request->array_taxeble_amount[$i],
                            'total_amount' => $request->array_total_amount[$i],
                            'storage_site_id' => $request->storage_site_id[$i],
                            'storage_location_id' => $request->storage_location_id[$i],
                            'rack_id' => $request->rack_id[$i],
                            'purchase_price' => $request->purchase_price[$i]??0,
                            'sale_price' => $request->sale_price[$i]??0,
                            'batch_no' => $request->batch_no[$i],
                            'cgst' => $request->array_cgst[$i] ?? 0,
                            'sgst' => $request->array_igst[$i] ?? 0,
                            'igst' => $request->array_igst[$i] ?? 0,
                            'updated_at' => date('Y-m-d h:i:s')
                        ];
                        GrnDetail::create($data);
                        $this->masterStockManage($data);
                    }
                }
                DB::commit();
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['error' => $e->getMessage()]);
            }
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
        $data = Grn::with('details')->where('deleted_at', null)->where('id', $id)->first();
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



            Grn::where('id', $id)->update($request->except(['_method', '_token', 'products', 'request_qty', 'price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'array_taxeble_amount', 'array_total_amount', 'array_tax_amount', 'tatal_tax']));
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
            Grn::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
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
        $data['data'] = Dispatch::with(['details', 'details', 'store', 'supplier', 'to_store'])->where('deleted_at', null)->where('dispatch_no', $dispatch_no)->first();
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['products'] = Product::where('deleted_at', null)->get();
        $data['page'] = $this->page;
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
            // ->where('storage_site_id', $dispatch_datails['storage_site_id'])
            // ->where('storage_location_id', $dispatch_datails['storage_location_id'])
            // ->where('rack_id', $dispatch_datails['rack_id'])
            ->where('batch_no', $dispatch_datails['batch_no'])
            ->first();
        if (!empty($inventry)) {
            $inventry->update([
                'qty' => $inventry->qty + $dispatch_datails['request_qty'],
                'purchase_price' => $dispatch_datails['purchase_price'],
                'sale_price' => $dispatch_datails['sale_price'],
            ]);
        } else {
            MasterStockInventery::create([
                'product_id' => $dispatch_datails['product_id'],
                'store_id' => loginStore()->id,
                'storage_site_id' => $dispatch_datails['storage_site_id'],
                'storage_location_id' => $dispatch_datails['storage_location_id'],
                'rack_id' => $dispatch_datails['rack_id'],
                'qty' => $dispatch_datails['received_qty'],
                'purchase_price' => $dispatch_datails['purchase_price'],
                'sale_price' => $dispatch_datails['sale_price'],
                'supplier_price' => $dispatch_datails['price'],
                'discount_amount' => $dispatch_datails['discount_amount'] ?? 0,
                'batch_no' => $dispatch_datails['batch_no'],
            ]);
        }
    }
}
