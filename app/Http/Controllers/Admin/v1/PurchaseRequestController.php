<?php

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Requisition;
use App\Models\User;
use App\Models\Store;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Purchase';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            if (isAdmin()) {
                $data = Purchase::with(['store', 'supplier', 'to_store'])->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isCentral()) {
                $data = Purchase::with(['store', 'supplier', 'to_store'])->where('to_store', loginStore()->id)->whereColumn('to_store', '!=', 'store_id')->where('deleted_at', null)->orderByDesc('id')->get();
            }

            if (isPublisher()) {
                $data = Purchase::with(['store', 'supplier', 'to_store'])->where('deleted_at', null)->where('supplier_id', auth()->user()->id)->whereColumn('to_store', '=', 'store_id')->orderByDesc('id')->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.purchase_request.buttons', ['item' => $row, "route" => 'purchase', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.purchase_request.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $data['stores'] =  Store::where('deleted_at', null)->get();
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['suppliers'] = User::where('type', 'publisher')->get();
        $data['products'] = Product::where('deleted_at', null)->get();
        $data['requisitions'] = Requisition::where('deleted_at', null)->get();
        $data['page'] = $this->page;
        return view('admin.v1.purchase_request.insert', $data);
    }

    public function status($id)
    {
        $status = Purchase::find($id);
        if ($status->status == "active") {
            Purchase::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Purchase::where('id', $id)->update(['status' => 'active']);
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
            'po_no' => 'required|string|unique:purchases,po_no',
            'requisition_no' => 'required|string|unique:purchases,requisition_no',
        ]);

        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            // try {
            $request->merge([
                'store_id' => loginStore()->id,
                'created_by' => auth()->user()->id,
                'dispatch_by' => auth()->user()->id,
                'round_off_amount' => $request->total_amount,
                'paid_amount' => $request->total_amount,
                'po_no' => $request->po_no

            ]);

            $data =  Purchase::create($request->except(['_token', 'products', 'request_qty', 'mrp_price', 'purchase_price', 'sale_price', 'batch_no', 'array_gst', 'array_cgst', 'array_igst', 'array_sgst', 'tax_amount', 'array_taxeble_amount', 'array_total_amount', 'description']));

            if (count($request->products) > 0) {
                for ($i = 0; $i < count($request->products); $i++) {
                    PurchaseDetails::create([
                        'purchase_id' => $data->id,
                        'product_id' => $request->products[$i],
                        'price' => $request->price[$i],
                        'request_qty' => $request->request_qty[$i],
                        'dispatch_qty' => $request->request_qty[$i],
                        'tax_amount' => $request->array_tax_amount[$i],
                        'taxeble_amount' => $request->array_taxeble_amount[$i],
                        'total_amount' => $request->array_total_amount[$i],
                        // 'purchase_price' => $request->purchase_price[$i],
                        // 'sale_price' => $request->sale_price[$i],
                        // 'batch_no' => $request->batch_no[$i],
                        'cgst' => $request->array_cgst[$i],
                        'sgst' => $request->array_igst[$i],
                        'igst' => $request->array_igst[$i],
                        'updated_at' => date('Y-m-d h:i:s')
                    ]);
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
        $stores =  Store::where('deleted_at', null)->get();
        $brands = Brand::where('deleted_at', null)->get();
        $suppliers = User::where('type', 'publisher')->get();
        $products = Product::where('deleted_at', null)->get();
        $page = $this->page;
        $data = Purchase::with('details')->where('deleted_at', null)->where('id', $id)->first();
        return view('admin.v1.purchase_request.show', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
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
        $data = Purchase::with('details')->where('deleted_at', null)->where('id', $id)->first();
        return view('admin.v1.purchase_request.edit', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
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
            'title' => 'required|string|unique:purchase,title,' . $id,
            'image' => 'image|mimes:png,jpg',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                Purchase::where('id', $id)->update($request->except(['_token', '_method', 'image']));
                if ($request->hasFile('image')) {
                    $this->update_images('purchase', $id, $request->file('image'), 'product', 'image');
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
            Purchase::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
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

    public function get_requisition($requistion_no = null)
    {

        if (empty($requistion_no)) {
            return '<div class="alert alert-danger" role="alert">
                      Please Enter the Requisition number
           </div>';
        }

        $stores =  Store::where('deleted_at', null)->where('type', 'central-store')->get();
        $brands = Brand::where('deleted_at', null)->get();
        $suppliers = User::where('type', 'publisher')->get();
        $products = Product::where('deleted_at', null)->get();
        $page = $this->page;
        $data = Requisition::with(['details','store', 'supplier', 'to_store'])->where('deleted_at', null)->where('requisition_no', $requistion_no)->where('status', 'approved')->first();
        if (empty($data)) {
            return '<div class="alert alert-warning" role="alert">
                  Please Check you Requistion number is approved
                  </div>';
        }

        return view('admin.v1.purchase_request.get_purchase', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
    }
}
