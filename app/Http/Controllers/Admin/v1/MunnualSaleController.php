<?php

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\MasterStockInventery;
use App\Models\Product;
use App\Models\Requisition;
use App\Models\SaleDetails;
use App\Models\User;
use App\Models\Store;
use Database\Seeders\MasterStockerSeeder;
use App\Models\Sale;
use App\Models\StorageSite;
use Illuminate\Support\Facades\DB;
use App\Models\Discount;
use App\Models\SalePayament;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;






class MunnualSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Sale';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            if (isAdmin()) {
                $data = Sale::with(['store', 'customer'])->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isCentral()) {
                $data = Sale::with(['store', 'customer'])->where('store_id', loginStore()->id)->where('deleted_at', null)->orderByDesc('id')->get();
            }
            if (isRetail()) {
                $data = Sale::with(['store', 'customer'])->where('store_id', loginStore()->id)->where('deleted_at', null)->orderByDesc('id')->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.mannual_sale.buttons', ['item' => $row, "route" => 'sale', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.mannual_sale.index', compact('page'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        if (isAdmin()) {
            $data['stores'] =  Store::where('deleted_at', null)->get();
        } else {
            $data['stores'] =  Store::where('deleted_at', null)->where('id', loginStore()->id)->get();
        }
        $data['suppliers'] = User::where('type', 'publisher')->get();
        $data['products'] = Product::where('deleted_at', null)->get();
       // $data['customers'] = Customer::where('deleted_at', null)->where('store_id', loginStore()->id)->get();
       $data['customers'] = Customer::whereHas('store', function ($query)  {
        $query->where('id', loginStore()->id);
    })->orWhereHas('sales.store', function ($query)  {
        $query->where('id', loginStore()->id);
    })->get();  
       $data['storage_sites'] = StorageSite::where('deleted_at', null)->where('store_id', loginStore()->id)->get();
        $data['page'] = $this->page;
        return view('admin.v1.mannual_sale.insert', $data);
    }

    public function status($id)
    {
        $status = Sale::find($id);
        if ($status->status == "active") {
            Sale::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Sale::where('id', $id)->update(['status' => 'active']);
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
        // return $request->all();
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
                ]);
                DB::beginTransaction();
                //return $request->products;
                $sale_data =  Sale::create([
                    'customer_id' => $request->customer_id,
                    'publisher_id' => $request->publisher_id,
                    'store_id' => $request->store_id,
                    'sale_by' => auth()->user()->id,
                    'sale_date' => date('Y-m-d'),
                    'total_tax' => $request->total_tax,
                    'discount_type' => 'F',
                    'discount' => $request->discount ?? 0,
                    'sub_total' => $request->taxeble_amount,
                    'total' => $request->total_amount,
                    'sale_mode' => 'manual',
                    'description' => $request->description,
                    'invoice_no' => $request->invoice_no,
                    'shipping_charges' => $request->shipping_charges ?? 0,
                    'storage_site_id' => $request->storage_site_id,
                    'status' => $request->mode_status,

                ]);

                if (count($request->products) > 0) {
                    for ($i = 0; $i < count($request->products); $i++) {
                        $product = Product::where('title', $request->products[$i])->first();
                        SaleDetails::create([
                            'sale_id' => $sale_data->id,
                            'product_id' => $product->id,
                            'price' => $request->price[$i],
                            'qty' => $request->request_qty[$i],
                            'tax_percentage' =>  $request->array_tax_percentage[$i],
                            //'taxeble_amount' => $request->array_taxeble_amount[$i],
                            'total_amount' => $request->array_total_amount[$i],
                        ]);

                        /* $data = [
                            'product_id' => $product->id,
                            'storage_site_id' => $request->storage_site_id,
                            'qty' => $request->request_qty[$i]
                        ];
                        $this->masterStockManage($data); */
                        DB::commit();
                    }
                }
                
                if( $request->mode_status == 'draft') {
                    return response()->json(['success' => $this->page . " SuccessFully Added "]);
                }
                if( $request->mode_status == 'unpaid') {
                    return $this->getSaleInvoiceData($request->invoice_no);
                }

            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }

    /*  public function show($inv_no)
    {

        $page = $this->page;
        $saledata = Sale::with(['store', 'user', 'customer', 'saledetails', 'saledetails.product'])->where('invoice_no', $inv_no)->firstOrFail();
        return view('admin.v1.mannual_sale.view', ['page' => $page, 'saledata' => $saledata]);
    } */ 

    public function search_cus_invoice($cus_id)
    {

        $page = $this->page;
        $saledata = Sale::where('customer_id', $cus_id)->where('status', 'unpaid')->firstOrFail();
        if($saledata) {
           return $this->getSaleInvoiceData($saledata->invoice_no);
        } else {
            return 'false';
        }
        //return view('admin.v1.mannual_sale.view', ['page' => $page, 'saledata' => $saledata]);
    } 

    public function getSaleInvoiceData($inv_no)
    {
        //return $inv_no;
        $saledata = Sale::with(['store', 'user', 'customer', 'saledetails', 'saledetails.product'])->where('invoice_no', $inv_no)->firstOrFail();
        // return $saledata->saledetails[0];
        return view('admin.v1.bill.bill', ['saledata' => $saledata]);
    }

    public function downloadSalePdf($inv_no)
    {
        //return $request->sale_id;
        // Get all sale details  from the database
        $saledata = Sale::with(['store', 'user', 'customer', 'saledetails', 'saledetails.product'])->where('invoice_no', $inv_no)->firstOrFail();
        // Generate QR image
        $qrCodeData = $saledata->invoice_no;
        if (!is_dir(public_path("qr_codes"))) {
            mkdir(public_path("qr_codes"));
        }
        $qrCodePath =  "qr_codes/$qrCodeData.svg";
        QrCode::size(200)->generate($saledata->total, public_path($qrCodePath));

        // Compress and store QR code image

        // Add QR code data and path to the array
        $qrCodes = [
            'data' => $qrCodeData,
            'path' => base64_encode(file_get_contents($qrCodePath)),
            'amount' => $saledata->total,
        ];
        // End QR Image
        $data = [
            'saledata' =>  $saledata,
            'qrCodes' => $qrCodes,
        ];
        // Store the PDF
        $pdf = Pdf::loadView('admin.v1.bill.bill_pdf_download', $data);
        $deleteFolderPath = public_path('qr_codes');
        $dd = File::cleanDirectory($deleteFolderPath);
        $time = date_create(now());
        $get_date = date_format($time, 'Y-m-d');
        $sl  = $get_date . '-Sale_Details'; // Generate a random code

        return $pdf->download($sl . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    /*  public function edit($id)
    {
        $stores =  Store::where('deleted_at', null)->where('type', 'central-store')->get();
        $brands = Brand::where('deleted_at', null)->get();
        $suppliers = User::where('type', 'publisher')->get();
        $products = Product::where('deleted_at', null)->get();
        $page = $this->page;
        $data = Sale::with('details')->where('deleted_at', null)->where('id', $id)->first();
        return view('admin.v1.requisition.edit', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
    } */
    public function edit($id)
    {

        $data['suppliers'] = User::where('type', 'publisher')->get();
        $data['storage_sites'] = StorageSite::where('deleted_at', null)->where('store_id', loginStore()->id)->get();
        $data['page'] = $this->page;
        //return $data['page'];
        $saledata = Sale::with(['store', 'user', 'supplier', 'customer', 'saledetails', 'saledetails.product'])->where('id', $id)->firstOrFail();
        // return $saledata;
        return view('admin.v1.mannual_sale.edit', ['data' => $data, 'saledata' => $saledata]);
        //
        /*  $stores =  Store::where('deleted_at', null)->where('id', loginStore()->id)->get();
        $brands = Brand::where('deleted_at', null)->get();
        $suppliers = User::where('type', 'publisher')->get();
        $products = Product::where('deleted_at', null)->get();
        return $products;
        $page = $this->page;
        $data = Sale::with('details')->where('deleted_at', null)->where('id', $id)->first();
        return view('admin.v1.mannual_sale.edit', compact('page', 'brands', 'stores', 'suppliers', 'products', 'data'));
         */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function updateSale(Request $request)
    {
        //return $request->products;
        $validate = Validator::make($request->all(), [
            // 'title' => 'required|string|unique:purchase,title',
        ]);

        // dd($request->all());
        if ($validate->fails()) {
            return $validate->errors();
        }
        try {
            $request->merge([
                'updated_by' => auth()->user()->id,
            ]);
            DB::beginTransaction();

            Sale::where('id', $request->saleid)->update([
                'customer_id' => $request->customer_id,
                'publisher_id' => $request->publisher_id,
                'store_id' => $request->store_id,
                'sale_date' => date('Y-m-d'),
                'total_tax' => $request->total_tax,
                'discount_type' => 'F',
                'discount' => $request->discount ?? 0,
                'sub_total' => $request->taxeble_amount,
                'total' => $request->total_amount,
                'sale_mode' => 'manual',
                'description' => $request->description,
                'invoice_no' => $request->invoice_no,
                'shipping_charges' => $request->shipping_charges ?? 0,
                'storage_site_id' => $request->storage_site_id,
                'status' => $request->mode_status,

            ]);

            SaleDetails::where('sale_id', $request->saleid)->delete();
            if (count($request->products) > 0) {
                for ($i = 0; $i < count($request->products); $i++) {
                    $product = Product::where('title', $request->products[$i])->first();
                    //return $request->array_tax_percentage;
                    SaleDetails::create([
                        'sale_id' => $request->saleid,
                        'product_id' => $product->id,
                        'price' => $request->price[$i],
                        'qty' => $request->request_qty[$i],
                        'tax_percentage' =>  $request->array_tax_percentage[$i],
                        //'taxeble_amount' => $request->array_taxeble_amount[$i],
                        'total_amount' => $request->array_total_amount[$i],
                    ]);
                    DB::commit();
                }
            }
           // return response()->json(['success' => $this->page . " SuccessFully Updated "]);
           return $this->getSaleInvoiceData($request->invoice_no);
        } catch (Exception $e) {
            DB::rollback();
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
            Sale::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
    public function search(Request $request, $product = null)
    {
        // return $request->publisher_id;
        //$products =  Product::with('gst')->where('deleted_at', null)->where('supplier_id', $request->publisher_id)->where('title', 'like', '%' . $product . '%')->limit(50)->get();
        $products =  Product::with('gst')->where('deleted_at', null)->where('supplier_id', $request->publisher_id)->limit(50)->get();
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

    function productPrice(Request $request, $product = null)
    {
        $data = Product::with('gst')->where('title', $product)->where('deleted_at', null)->first();
        $master_stock_inventry = MasterStockInventery::where('product_id', $data->id)->where('storage_site_id', $request->storage_site_id)->where('store_id', loginStore()->id)->first();
        $data->stock = $master_stock_inventry;
        return $data;
    }


    public function productByStorageSite($site_id)
    {
        $master_stock_inventry =  MasterStockInventery::where('storage_site_id', $site_id)->get();
    }

    public function masterStockManage($data)
    {
        $inventry =  MasterStockInventery::where('store_id', auth()->user()->store_id)
            ->where('product_id', $data['product_id'])
            ->where('storage_site_id', $data['storage_site_id'])
            ->where('qty', '>', 0)
            ->first();

        $inventry->update([
            'qty' => $inventry->qty - $data['qty']
        ]);
    }

    //==================By TApas ======================================
    public function discountPrice(Request $request)
    {
        $disamount = 0.00;
        $discount = Discount::whereRaw('CAST(`min` AS UNSIGNED) <= ?', [$request->taxeble_amount])
        ->orderBy('min', 'desc')
        ->first();
        $data = Discount::whereRaw('CAST(`min` AS UNSIGNED) <= ?', [$request->taxeble_amount])
            ->orderBy('min', 'desc')
            ->first();
        //return  $discount;
            $disamount = ($request->taxeble_amount * $discount->discount) / 100;
            //return $disamount;
            return view('admin.v1.mannual_sale.coupon', compact('data','disamount'));
    }

    public function payout_pending()
    {

        //         $data = Sale::with(['store', 'salepayament','supplier' => function ($query) {
        //             $query->where('payment_status', 'pending');
        //         }])->where('store_id', loginStore()->id)->where('status', 'paid')->orderByDesc('id')->get();

        // //return $data;
        $data = Sale::with('salepayament','supplier')->where('sale_by',auth()->user()->id)->where('status','paid')->get();

        return view('admin.v1.mannual_sale.payout_pending', compact('data'));
    }
}
