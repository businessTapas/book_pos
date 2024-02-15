<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\District;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Validation\Rules\Password;
class CentralcustomerlatestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page = 'central';
    public function index(Request $request)
    
        {
            // $page = $this->page;
            // if ($request->ajax()) {
            //   //  $data = Store::with('district')->where('deleted_at', null)->where('created_by', auth()->user()->id)->get();
            //     if (auth()->user()->type == "supplier") {
            //         $data = Store::with('district')->where('deleted_by', null)->get();
            //     } else {
            //         $data = Store::with('district')->where('deleted_at', null)->where('created_by', auth()->user()->id)->get();
            //     }
            //     return Datatables::of($data)
            //         ->addIndexColumn()
            //         ->addColumn('action', function ($row) {
            //             $actionBtn = view('admin.v1.store.buttons', ['item' => $row, "route" => 'central', 'page' => $this->page]);
            //             return $actionBtn;
            //         })
            //         ->rawColumns(['action'])
            //         ->make(true);
            // }
            // $districts = District::where('deleted_at', null)->get();
            // return view('admin.v1.store.index', compact('page', 'districts'));
        }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function status($id)
     {
        $status = Store::find($id);
        if ($status->status == "active") {
            Store::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Store::where('id', $id)->update(['status' => 'active']);
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
        // {
        //     $validate = Validator::make($request->all(), [
        //         'store_name' => 'required|string|unique:stores,store_name',
        //         'email' => 'required|string|unique:users,email',
        //         'password' => ['required', Password::defaults(), 'confirmed'],
    
        //     ]);
        //     if ($validate->fails()) {
        //         return $validate->errors();
        //     } else {
        //         try {
    
    
        //             if (empty(get_admin_role($request->type))) {
        //                 return response()->json(['error' => "First you have to create the role for " . $request->type]);
        //             }
    
        //             $request->request->add(['created_by' => auth()->user()->id]);
        //             $data =  Store::create($request->except('_token','type'));
        //             $request->merge(
        //                 [
        //                     'store_id' => $data->id,
        //                     'role_id' => get_admin_role($request->type),
        //                     'password' => Hash::make($request->password),
        //                     'created_by' => auth()->user()->id
        //                 ]
        //             );
        //             $user =  User::create($request->except('_token'));
        //             if (empty($user)) {
        //                 Store::delete($data->id);
        //             }
        //             return response()->json(['success' => $this->page . " SuccessFully Added "]);
        //         } catch (Exception $e) {
        //             // return response()->json(['error' => $this->page . " showing somthing wrong "]);
        //             return response()->json(['error' => $e->getMessage()]);
        //         }
        //     }
        // }
    
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
        $editc = Store::where('id',$id)->first();
        $disc = District::all();
        return view('admin.v1.centralstorenew.edit',compact('editc','disc'));
      
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
        Store::where('id',$id)->update([
            'store_name' => $request->store_name,
            'address' =>$request->address,
            'description'=>$request->description,
            'district_id' =>$request->district_id,
        ]);
        return redirect()->route('central.showdetail')->with('update','update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Store::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }

    public function showdetails()
    {
        $id=auth()->user()->id;
          $centrals= User::with('store')->where('id', $id)->get();
        return view('admin.v1.centralstorenew.showdetails',compact('centrals'));
    }
}
