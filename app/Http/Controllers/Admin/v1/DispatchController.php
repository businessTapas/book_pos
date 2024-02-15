<?php

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\RequisitionDetails;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Dispatch;
use App\Models\DispatchDetails;
use App\Models\MasterStockInventery;
use App\Models\Rack;
use App\Models\User;
use App\Models\Store;
use App\Models\Requisition;
use App\Models\StorageLocation;
use App\Models\StorageSite;
use Illuminate\Support\Facades\DB;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Dispatch';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {

            if (isAdmin()) {
                $data = Dispatch::with(['store', 'supplier'])->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isCentral()) {
                $data = Dispatch::with(['store', 'supplier'])->where('deleted_at', null)->where('to_store', loginStore()->id)->orderByDesc('id')->get();
            }
            if (isRetail()) {
                $data = Dispatch::with(['store', 'supplier'])->where('deleted_at', null)->where('store_id', loginStore()->id)->orderByDesc('id')->get();
            }
            if (isPublisher()) {
                $data = Dispatch::with(['store', 'supplier'])->where('deleted_at', null)->where('supplier_id', auth()->user()->id)->orderByDesc('id')->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.dispatch.buttons', ['item' => $row, "route" => 'dispatch', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.dispatch.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $data['products'] = Product::where('deleted_at', null)->get();
        if (isPublisher()) {
            $data['purchases'] = Purchase::where('deleted_at', null)->whereColumn('store_id', '=', 'to_store')->orderByDesc('id')->get();
        }
        if (isCentral()) {
            $data['purchases'] = Purchase::where('deleted_at', null)->whereColumn('store_id', '<>', 'to_store')->orderByDesc('id')->get();
        }
        $data['page'] = $this->page;

        return view('admin.v1.dispatch.insert', $data);
    }

    public function status($id)
    {
        $status = Dispatch::find($id);
        if ($status->status == "active") {
            Dispatch::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Dispatch::where('id', $id)->update(['status' => 'active']);
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
            'dispatch_no' => 'required|string|unique:dispatches,dispatch_no',
            'po_no' => 'required|string|unique:dispatches,po_no',
        ]);

        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->merge([
                    'created_by' => auth()->user()->id,
                    'round_off_amount' => $request->total_amount,
                    'paid_amount' => $request->total_amount,
                    'po_no' => $request->po_no

                ]);
                if (isCentral()) {
                    $request->merge([
                        'supplier_id' => Store::find(loginStore()->id)->id

                    ]);
                }
                if (isRetail()) {
                    $request->merge([
                        'supplier_id' => Store::find(loginStore()->id)->id
                    ]);
                }

                $purchase =  Purchase::where('po_no', $request->po_no)->first();
                DB::beginTransaction();
                Requisition::where('requisition_no', $purchase->requisition_no)->update([
                    'status' => 'DO Generated'
                ]);

                $data =  Dispatch::create($request->except(['_token', 'products', 'request_qty', 'mrp_price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'tax_amount', 'array_taxeble_amount', 'array_total_amount', 'description']));

                if (count($request->products) > 0) {
                    for ($i = 0; $i < count($request->products); $i++) {

                        $dispatch_datails = [
                            'dispatch_id' => $data->id,
                            'product_id' => $request->products[$i],
                            'price' => $request->price[$i],
                            'request_qty' => $request->request_qty[$i],
                            'dispatch_qty' => $request->request_qty[$i],
                            'tax_amount' => $request->array_tax_amount[$i],
                            'taxeble_amount' => $request->array_taxeble_amount[$i],
                            'total_amount' => $request->array_total_amount[$i],
                            'storage_site_id' => $request->storage_site_id[$i],
                            'storage_location_id' => $request->storage_location_id[$i],
                            'rack_id' => $request->rack_id[$i],
                            // 'purchase_price' => $request->purchase_price[$i],
                            // 'sale_price' => $request->sale_price[$i],
                            'batch_no' => $request->batch_no[$i],
                            'cgst' => $request->array_cgst[$i] ?? 0,
                            'sgst' => $request->array_sgst[$i] ?? 0,
                            'igst' => $request->array_igst[$i] ?? 0,
                            'updated_at' => date('Y-m-d h:i:s')
                        ];
                        DispatchDetails::create($dispatch_datails);
                        $this->masterStockManage($dispatch_datails);
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
        $data['stores'] =  Store::where('deleted_at', null)->get();
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['suppliers'] = User::where('type', 'publisher')->get();
        $data['products'] = Product::where('deleted_at', null)->get();


        $data['page'] = $this->page;
        $data['data'] = Dispatch::with(['details', 'store', 'supplier', 'to_store'])->where('deleted_at', null)->where('id', $id)->first();
        return view('admin.v1.dispatch.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores =  Store::where('deleted_at', null)->get();
        $brands = Brand::where('deleted_at', null)->get();
        $suppliers = User::where('type', 'publisher')->get();
        $products = Product::where('deleted_at', null)->get();
        $page = $this->page;
        $data = Dispatch::with('details')->where('deleted_at', null)->where('id', $id)->first();
        return view('admin.v1.dispatch.edit', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
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
            'title' => 'required|string|unique:dispatches,title,' . $id,
            'image' => 'image|mimes:png,jpg',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                Dispatch::where('id', $id)->update($request->except(['_token', '_method', 'image']));
                if ($request->hasFile('image')) {
                    $this->update_images('dispatch', $id, $request->file('image'), 'product', 'image');
                }
                return response()->json(['success' => $this->page . " SuccessFully Updated "]);
            } catch (Exception $e) {
                // return response()->json(['error' => $this->page . " showing somthing wrong "]);
                return response()->json(['error' => $e->getMessage()]);
            }
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
            Dispatch::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
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

    public function get_purchase($po_no = null)
    {

        if (empty($po_no)) {
            return '<div class="alert alert-danger" role="alert">
                      Please Enter the Purchase order number
           </div>';
        }
        if (isPublisher()) {
            $data['data'] = Purchase::with(['details', 'store', 'supplier', 'to_store'])->where('deleted_at', null)->where('po_no', $po_no)->whereColumn('store_id', '=', 'to_store')->first();
        }
        if (isCentral()) {
            $data['data'] = Purchase::with(['details', 'store', 'supplier', 'to_store'])->where('deleted_at', null)->where('po_no', $po_no)->whereColumn('store_id', '<>', 'to_store')->first();
        }
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['products'] = Product::where('deleted_at', null)->get();

        $data['page'] = $this->page;
        if (empty($data)) {
            return '<div class="alert alert-warning" role="alert">
                  Please Check you Purchase order number 
                  </div>';
        }
        return view('admin.v1.dispatch.get_dispatch', $data);
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
        $inventry->update([
            'qty' => $inventry->qty - $dispatch_datails['request_qty']
        ]);
    }
}
