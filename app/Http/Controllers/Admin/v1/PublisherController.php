<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\Store;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page = 'Publisher';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
          //  $data = Publisher::with('district')->where('deleted_at', null)->where('created_by', auth()->user()->id)->get();
            if (auth()->user()->type == "admin") {
                $data = Publisher::with('district')->where('deleted_at', null)->get();
            } else {
                $data = Publisher::with('district')->where('deleted_at', null)->where('created_by', auth()->user()->id)->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.publisher.buttons', ['item' => $row, "route" => 'publisher', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $districts = District::where('deleted_at', null)->where('state', 'West Bengal')->get();
        return view('admin.v1.publisher.index', compact('page', 'districts'));
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
        $status = Publisher::find($id);
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
        $validate = Validator::make($request->all(), [
            'store_name' => 'required|string|unique:publishers,store_name',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required|string|digits:10|unique:users,phone',
            'password' => ['required', Password::defaults(), 'confirmed'],

        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {


                if (empty(get_admin_role($request->type))) {
                    return response()->json(['error' => "First you have to create the role for " . $request->type]);
                }
                //return $request->all();
                $request->request->add(['created_by' => auth()->user()->id]);
                                 
                $data =  Publisher::create($request->except('_token','type','phone','name'));
                if ($request->hasFile('logo_image')) {
                    if (!is_dir(public_path("upload/publisher"))) {
                        mkdir(public_path("upload/publisher"));
                    }
                    //return $request->file('image');
                    Publisher::where('id', $data->id)->update(['logo_image' => $this->insert_image($request->file('logo_image'), 'publisher')]);
                }
                $request->merge(
                    [
                        'publisher_id' => $data->id,
                        'parent_id' => auth()->user()->id,
                        'role_id' => get_admin_role($request->type),
                        'password' => Hash::make($request->password),
                        'created_by' => auth()->user()->id
                        
                    ]
                );
                $user =  User::create($request->except('_token'));
                if (empty($user)) {
                    Publisher::delete($data->id);
                }
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } catch (Exception $e) {
                // return response()->json(['error' => $this->page . " showing somthing wrong "]);
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
        $data = Publisher::find($id);
        $page = $this->page;
        $districts = District::where('deleted_at', null)->where('state', 'West Bengal')->get();


        return view('admin.v1.publisher.edit', compact('data', 'page', 'districts'));
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
            'store_name' => 'required|string|unique:publishers,store_name,' . $id,
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        }
        try {
            $request->request->add(['updated_by' => auth()->user()->id]);
            Publisher::where('id', $id)->update($request->except(['_token', '_method']));
            return response()->json(['success' => $this->page . " SuccessFully Updated "]);
        } catch (Exception $e) {
            // return response()->json(['error' => $this->page . " showing somthing wrong "]);
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
            Publisher::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
}