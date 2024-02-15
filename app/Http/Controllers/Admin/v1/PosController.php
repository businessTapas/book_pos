<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Store;
use App\Models\Address;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use App\Models\SaleDetails;
use App\Models\Sale;
use App\Models\MasterStockInventery;
use App\Models\StorageSite;
use Exception;

class PosController extends Controller
{
    public $page = 'pos';
    public function tax($carts)
    {
        $totaltax = 0.00;
        foreach ($carts as $cart) {
            $itemtax = ($cart->price * $cart->qty) * 0.18;
            $totaltax += $itemtax;
        }
    }
    public function index(Request $request)
    {
        $books = Product::where('deleted_at', null)->paginate(12);;
        $stores = Store::where('deleted_at', null)->get();
        $category = Category::where('deleted_at', null)->get();
        $publishers = User::where('type', 'publisher')->get();
        //$customers = Customer::where('deleted_at', null)->get();
        $customers =  Customer::whereHas('store', function ($query)  {
        $query->where('id', loginStore()->id);
    })->orWhereHas('sales.store', function ($query)  {
        $query->where('id', loginStore()->id);
    })->get();  
        $storage_sites = StorageSite::where('deleted_at', null)->where('store_id', loginStore()->id)->get();

        return view('admin.v1.pos.index', compact('books', 'stores', 'category', 'publishers', 'customers', 'storage_sites'));
    }
    public function add_cart(Request $request, $product_id)
    {
        // // print_r($id);
        // $detail = Product::where('id', $id)->get();
        $data = Product::with('gst')->where('id', $product_id)->first();
        $entity = Cart::where('customer_id', $request->customer_id)->where('product_id', $product_id)->first();
        if ($entity) {
            $qty = $entity->qty;
            $entity->update([
                'qty' => $qty + 1,
            ]);
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
                'customer_id' => $request->customer_id,
                'price' => $data->price,
                'qty' => 1,
                'discount' => 0,
                'tax' => 0,
                'created_by' => auth()->user()->id
            ]);
        }
        $carts = Cart::where('deleted_at', null)->where('user_id', auth()->user()->id)->where('customer_id', $request->customer_id)->where('status', 'active')->get();
        $prices = 0.00;
        foreach ($carts as $cart) {
            $price = ($cart->price * $cart->qty);
            $prices = $prices + $price;
        }
        $disamount = 0.00;
        $discount = Discount::where('min', '<=', $prices)->get();

        return view('admin.v1.pos.cart', ['carts' => $carts, 'discount' => $discount, 'prices' => $prices, 'disamount' => $disamount]);
    }

    public function update_cart_qty(Request $request, $cart_id_qty)
    {
        // $detail = Product::where('id', $id)->get();
        $cq = explode('-', $cart_id_qty);
        // return $cq;
        $cart =  Cart::find($cq[0]);
        $customer_id = $cart->customer_id;
        $cart_data = Cart::where('id', $cq[0])->first();
        if ($cart_data) {
            $cart_data->update([
                'qty' =>  $cq[1],
            ]);
        }
        $carts = Cart::where('deleted_at', null)->where('user_id', auth()->user()->id)->where('customer_id', $customer_id)->where('status', 'active')->get();
        $prices = 0.00;
        foreach ($carts as $cart) {
            $price = ($cart->price * $cart->qty);
            $prices = $prices + $price;
        }
        $disamount = 0.00;
        $discount = Discount::where('min', '<=', $prices)->get();
        return view('admin.v1.pos.cart', ['carts' => $carts, 'discount' => $discount, 'prices' => $prices, 'disamount' => $disamount]);
    }

    /* public function search(Request $request)
    {
        $id = auth()->user()->store_id;
        $books = Product::with(['master_stock_inventory' => function ($query) use ($id, $request) {
            $query->where('store_id', $id)->where('storage_site_id', $request->storage_site_id);
        }])->where('deleted_at', null)
            ->when($request->supplier_id, function ($query) use ($request) {
                return $query->where('supplier_id', $request->supplier_id);
            })
            ->when($request->category_id, function ($query) use ($request) {
                return $query->where('category_id', $request->category_id);
            })
            ->paginate(12);
                       
           // return $books;
        return view('admin.v1.pos.book_list', compact('books'));
    } */
    public function search(Request $request)
    {
        $id = auth()->user()->store_id;
        $books = Product::with(['master_stock_inventory' => function ($query) use ($id, $request) {
            $query->where('store_id', $id)->where('storage_site_id', $request->storage_site_id);
        }])->where('deleted_at', null)
            ->where('supplier_id', $request->publisher_id)
            ->when($request->category_id, function ($query) use ($request) {
                return $query->where('category_id', $request->category_id);
            })
            ->paginate(12);
        //return $books;
        return view('admin.v1.pos.book_list', compact('books'));
    }

    public function delete_cart($id)
    {
        $cart =  Cart::find($id);
        $customer_id = $cart->customer_id;
        $cart->delete($id);
        $carts = Cart::where('deleted_at', null)->where('user_id', auth()->user()->id)->where('customer_id', $customer_id)->where('status', 'active')->get();

        $prices = 0.00;
        foreach ($carts as $cart) {
            $price = ($cart->price * $cart->qty);
            $prices = $prices + $price;
        }
        $disamount = 0.00;
        $discount = Discount::where('min', '<=', $prices)->get();

        return view('admin.v1.pos.cart', ['carts' => $carts, 'discount' => $discount, 'prices' => $prices, 'disamount' => $disamount]);
    }

    public function get_customer($customer_id)
    {
        $carts = Cart::where('deleted_at', null)->where('user_id', auth()->user()->id)->where('customer_id', $customer_id)->where('status', 'active')->get();

        $prices = 0.00;
        foreach ($carts as $cart) {
            $price = ($cart->price * $cart->qty);
            $prices = $prices + $price;
        }
        $disamount = 0.00;

        $discount = Discount::where('min', '<=', $prices)->get();

        return view('admin.v1.pos.cart', ['carts' => $carts, 'discount' => $discount, 'prices' => $prices, 'disamount' => $disamount]);
    }

    public function add_customer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required|unique:customers,phone',
            'gender' => 'required',
            'dob'  => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',


        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $id = auth()->user()->id;

            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'created_by' => $id,
            ]);

            if ($customer) {
                $data = Address::create([
                    'customer_id' => $customer->id,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'pincode' => $request->pincode,
                    'address' => $request->address,
                    'created_by' => $id,
                ]);
                return response()->json(['success' =>  " Successfully Added"]);
            } else {
                return response()->json(['error' => 'Failed to add customer']);
            }
        }
    }

    public function discount(Request $request, $id)
    {
        $data = Discount::where('id', $id)->first();
        $carts = Cart::where('deleted_at', null)->where('user_id', auth()->user()->id)->where('customer_id', $request->customer_id)->where('status', 'active')->get();
        $prices = 0.00;
        foreach ($carts as $cart) {
            $price = ($cart->price * $cart->qty);
            $prices = $prices + $price;
        }
        $disamount = ($prices * $data->discount) / 100;
        $discount = Discount::where('min', '<=', $prices)->get();

        return view('admin.v1.pos.cart', ['carts' => $carts, 'discount' => $discount, 'prices' => $prices, 'disamount' => $disamount]);
    }

    public function books(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $data = Product::where('title', 'LIKE', '%' . $request->search . "%")->get();
            if ($data) {
                foreach ($data as $key => $book) {
                    $output .= '<tr>' .
                        '<td>' . $book->id . '</td>' .
                        '<td>' . $book->title . '</td>' .
                        '<tr>';
                }
                return Response($output);
            }
        }
    }

    public function pos_sale_store(Request $request)
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
                //return $request;
                $sale_data =  Sale::create([
                    'customer_id' => $request->customer_id,
                    'publisher_id' => $request->publisher_id,
                    'store_id' => auth()->user()->store_id,
                    'sale_by' => auth()->user()->id,
                    'sale_date' => date('Y-m-d'),
                    'total_tax' => $request->total_tax,
                    'discount_type' => 'F',
                    'discount' => $request->discount ?? 0,
                    'sub_total' => $request->taxeble_amount,
                    'total' => $request->total_amount,
                    'sale_mode' => 'pos',
                    // 'description' => $request->description,
                    'invoice_no' => $request->invoice_no,
                    'shipping_charges' => $request->shipping_charges ?? 0,
                    'storage_site_id' => $request->storage_site_id,
                    //'status' => $request->mode_status,

                ]);
                $carts = Cart::where('deleted_at', null)->where('user_id', auth()->user()->id)->where('customer_id', $request->customer_id)->where('status', 'active')->get();


                if (count($carts) > 0) {
                    for ($i = 0; $i < count($carts); $i++) {
                        SaleDetails::create([
                            'sale_id' => $sale_data->id,
                            'product_id' => $carts[$i]->product_id,
                            'price' => $carts[$i]->price,
                            'qty' => $carts[$i]->qty,
                            'tax_percentage' =>  $request->array_tax_percentage[$i] ?? 0,
                            //'taxeble_amount' => $request->array_taxeble_amount[$i],
                            'total_amount' => $carts[$i]->price * $carts[$i]->qty,
                        ]);

                        /* $data = [
                            'product_id' => $product->id,
                            'storage_site_id' => $request->storage_site_id,
                            'qty' => $request->request_qty[$i]
                        ];
                        $this->masterStockManage($data); */
                        DB::commit();
                    }
                    Cart::where('deleted_at', null)->where('user_id', auth()->user()->id)->where('customer_id', $request->customer_id)->update([
                        'status' => 'inactive',
                    ]);
                }
                return $this->getSaleInvoiceData($request->invoice_no);
                //return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }

    public function show($inv_no)
    {

        $page = $this->page;
        $saledata = Sale::with(['store', 'user', 'customer', 'saledetails', 'saledetails.product'])->where('invoice_no', $inv_no)->firstOrFail();
        return view('admin.v1.mannual_sale.view', ['page' => $page, 'saledata' => $saledata]);
    }


    public function coupon($total)
    {
        $total = $total;
        $data = Discount::whereRaw('CAST(`min` AS UNSIGNED) <= ?', [$total])
            ->orderBy('min', 'asc')
            ->first();

        return view('admin.v1.pos.coupan', compact('data'));
    }

    public function getSaleInvoiceData($inv_no)
    {
        //return $inv_no;
        $saledata = Sale::with(['store', 'user', 'customer', 'saledetails', 'saledetails.product'])->where('invoice_no', $inv_no)->firstOrFail();
        // return $saledata->saledetails[0];
        return view('admin.v1.bill.bill', ['saledata' => $saledata]);
    }

    public function payment()
    {
        $data = Sale::with('customer', 'supplier')->where('sale_by', auth()->user()->id)->get();
        return view('admin.v1.pos.customerpayment', compact('data'));
    }
}
