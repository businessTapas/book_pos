<?php

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Requisition;
use App\Models\RequisitionDetails;
use App\Models\User;
use App\Models\Store;


class RequisitionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Requisition';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            if (isAdmin()) {
                $data = Requisition::with(['store', 'supplier', 'to_store'])->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isCentral()) {
                $data = Requisition::with(['store', 'supplier', 'to_store'])->where('to_store', loginStore()->id)->whereColumn('to_store', '!=', 'store_id')->where('deleted_at', null)->orderByDesc('id')->get();
            }

            if (isPublisher()) {
                $data = Requisition::with(['store', 'supplier', 'to_store'])->where('deleted_at', null)->where('supplier_id', auth()->user()->id)->whereColumn('to_store', '=', 'store_id')->orderByDesc('id')->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.requisition_request.buttons', ['item' => $row, "route" => 'requisition-request', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.requisition_request.index', compact('page'));
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
        $suppliers = User::where('type', 'publisher')->where('store_id', loginStore()->id)->get();
        $products = Product::where('deleted_at', null)->get();
        $page = $this->page;
        return view('admin.v1.requisition.insert', compact('page', 'brands', 'stores', 'suppliers', 'products'));
    }

    public function status($id)
    {
        $status = Requisition::find($id);
        if ($status->status == "active") {
            Requisition::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Requisition::where('id', $id)->update(['status' => 'active']);
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

        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->merge([
                    'store_id' => loginStore()->id,
                    'created_by' => auth()->user()->id,
                    'requisition_date' => date('Y-m-d'),
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

                $data =  Requisition::create($request->except(['_token', 'products', 'request_qty', 'mrp_price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'array_taxeble_amount', 'array_total_amount']));

                if (count($request->products) > 0) {
                    for ($i = 0; $i < count($request->products); $i++) {
                        RequisitionDetails::create([
                            'requisition_id' => $data->id,
                            'product_id' => $request->products[$i],
                            'price' => $request->price[$i],
                            'request_qty' => $request->request_qty[$i],
                            'dispatch_qty' => $request->request_qty[$i],
                            'received_qty' => $request->request_qty[$i],
                            'tax_amount' => 0,
                            'taxeble_amount' => $request->array_taxeble_amount[$i],
                            'total_amount' => $request->array_total_amount[$i],
                        ]);
                    }
                }
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } catch (Exception $e) {
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
        $data = Requisition::with(['details', 'details.product.gst'])->where('deleted_at', null)->where('id', $id)->first();

        return view('admin.v1.requisition_request.edit', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
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
            // 'supplier_id' => 'required|numeric',
            'requisition_no' => 'required|string|unique:requisitions,requisition_no,' . $id,
            'expected_delivery_date' => 'required|date',
            'transport_details' => 'required|string',
            'transport_charge' => 'required|numeric',
        ]);

        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        }
        // try {
        $request->merge([
            'updated_by' => auth()->user()->id,
        ]);

        Requisition::where('id', $id)->update($request->except(['_method', '_token', 'products', 'request_qty', 'price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'array_taxeble_amount', 'array_total_amount', 'array_tax_amount', 'tatal_tax']));
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
                    // 'purchase_price' => $request->purchase_price[$i],
                    // 'sale_price' => $request->sale_price[$i],
                    // 'batch_no' => $request->batch_no[$i],
                    'cgst' => $request->array_cgst[$i] ?? 0,
                    'sgst' => $request->array_sgst[$i] ?? 0,
                    'igst' => $request->array_igst[$i] ?? 0,
                    'updated_at' => date('Y-m-d h:i:s')
                ]);
            }
        }
        return response()->json(['success' => $this->page . " SuccessFully Updated "]);
        // } catch (Exception $e) {
        //     return response()->json(['error' => $e->getMessage()]);
        // }
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
            Requisition::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
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
}
