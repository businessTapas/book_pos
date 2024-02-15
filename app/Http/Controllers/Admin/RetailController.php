<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class RetailController extends Controller
{
     public $page= 'customer';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $id = auth()->user()->id;
            $data = Customer::with('address')->where('created_by', $id)->get();
            return Datatables::of($data)
                ->addIndexColumn()
              ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.customer.buttons', ['item' => $row, 'route'=> 'retail.customer','page' => $this->page]);
                     return $actionBtn;
               })
                ->rawColumns(['action'])
                 ->make(true);
         }
        // $id = auth()->user()->id;
        // $customers = Customer::with('address')->where('created_by', $id)->get();
        return view('admin.v1.customer.customerindex');
    }

    public function create()
    {
        $districts = District::where('deleted_at', null)->where('state', 'West Bengal')->get();
        $countries = District::where('deleted_at', null)->where('country', 'India')->get();
        return view('admin.v1.customer.add', compact('districts','countries'));
    }
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
            'phone' => 'required|unique:customers,phone',
            'gender' => 'required',
            'dob'  => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'district_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->WithInput();
        } else {
            //$id = auth()->user()->id;
            $customer =  new Customer();
            $customer->name = $request->first_name.' '.$request->last_name;
            $customer->first_name = $request->first_name;


            $customer->last_name = $request->last_name;

            $customer->company_name = $request->company_name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->alternative_phone = $request->alternative_phone;
            $customer->gender = $request->gender;
            $customer->dob = $request->dob;
            $customer->created_by = auth()->user()->id;
            $customer->store_id = auth()->user()->store_id;
            $customer->save();
            if($customer->save()){
                $customer_id = $customer->id;
                $data = new Address();
                $data->customer_id = $customer_id;
                $data->city = $request->city;
                $data->state = $request->state;
                $data->country = $request->country;
                $data->pincode = $request->pincode;
                $data->address = $request->address;
                $data->district_id = $request->district_id;
                $data->created_by = auth()->user()->id;
                $data->save();
            }
            return redirect()->route('retail.customer')->with('success', 'Added successfully');
        }
    }
    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('admin.v1.customer.edit', compact('customer'));
    }
    public function update(Request $request, $id)
    {
        Customer::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob'   =>  $request->dob,
        ]);
        return redirect()->route('retail.customer')->with('update', 'update successfully');
    }
}
