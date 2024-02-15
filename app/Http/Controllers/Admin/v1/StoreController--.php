<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\Store;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Store';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $data = Store::with('district')->where('deleted_at', null)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.store.buttons', ['item' => $row, "route" => 'stores', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $districts = District::where('deleted_at', null)->get();
        return view('admin.v1.store.index', compact('page', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
        $validate = Validator::make($request->all(), [
            'store_name' => 'required|string|unique:stores,store_name',
            'email' => 'required|string|unique:users,email',
            'password' => ['required', Password::defaults(), 'confirmed'],

        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {

                
                if (empty(get_admin_role($request->type))) {
                    return response()->json(['error' => "First you have to create the role for " . $request->type]);
                }

                $request->request->add(['created_by' => auth()->user()->id]);
                $data =  Store::create($request->except('_token'));
                $request->merge(
                    [
                        'store_id' => $data->id,
                        'role_id' => get_admin_role($request->type),
                        'password' => Hash::make($request->password)
                    ]
                );
                $user =  User::create($request->except('_token'));
                if (empty($user)) {
                    Store::delete($data->id);
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
        $data = Store::find($id);
        $page = $this->page;
        $districts = District::where('deleted_at', null)->get();


        return view('admin.v1.store.edit', compact('data', 'page','districts'));
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
            'store_name' => 'required|string|unique:districts,store_name,' . $id,
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                Store::where('id', $id)->update($request->except(['_token', '_method', 'icon']));
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
        // try {
        Store::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
        return "Delete";
        // } catch (Exception $e) {
        //     return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        // }
    }
}
