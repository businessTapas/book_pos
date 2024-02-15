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
use App\Models\Publisher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Store';
    public function index(Request $request, $type)
    {
        $this->page = $type;
        $page = $this->page;
        // if ($request->ajax()) { 
        //  $data = Store::with('district')->wthere('deleed_at', null)->where('created_by', auth()->user()->id)->get();
        if (auth()->user()->type == "admin") {
            $data = Store::with('district')->where('type', $type)->where('deleted_by', null)->orderBy('id', 'DESC')->get();
        } else {
            $user_publisher_data = User::with('publisher')->where('id', auth()->user()->id)->first();
            //return  $user_publisher_data->publisher->id;
            //$data = Store::with('district')->where('type', $type)->where('publisher_id', $user_publisher_data->publisher->id)->where('deleted_by', null)->orderBy('id', 'DESC')->get();
            $data = Store::with('district')
                ->where('type', $type)
                ->where('deleted_by', null)
                ->when($user_publisher_data->publisher, function ($query) use ($user_publisher_data) {
                    $query->where('publisher_id', $user_publisher_data->publisher->id);
                })
                ->orderBy('id', 'DESC')
                ->get();
            //return $data;
            /*  $data = User::query()
                ->with(['store' => function ($query) {
                    $query->select(['']);
                }])->where('type', $type)->where('parent_id', auth()->user()->id)->where('deleted_by', null)->orderBy('id', 'DESC')->get();
                $r = $data[0]->store; */
        }
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.store.buttons', ['item' => $row, "route" => 'stores', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $districts = District::where('deleted_at', null)->where('state', 'West Bengal')->get();
        $publishers = Publisher::where('deleted_at', null)->get();
        return view('admin.v1.store.index', compact('page', 'districts', 'publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $type)
    {
        $page = str_replace("-", " ", $type);
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
        //return $request->all();
        $validate = Validator::make($request->all(), [
            'store_name' => 'required|string|unique:stores,store_name',
            'email' => 'required|string|unique:users,email',
            'password' => ['required', Password::defaults(), 'confirmed'],
            /* 'publisher_id' => 'required', */

        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                // DB::enableQueryLog();


                if (empty(get_admin_role($request->type))) {
                    return response()->json(['error' => "First you have to create the role for " . $request->type]);
                }
                if (auth()->user()->type == "admin" && $request->type != 'retail-store') {

                    $publisher_user_data = Publisher::with('user')->where('id', $request->publisher_id)->first();
                    //return  $publisher_user_data->user->id;
                    $publisher_user_id = $publisher_user_data->user->id;
                } else {
                    $publisher_user_id = auth()->user()->id;
                    $request->request->add(['publisher_id' => auth()->user()->publisher_id]);
                }
                $request->request->add(['created_by' => auth()->user()->id]);
                $data =  Store::create($request->except('_token'));
                if ($request->hasFile('logo_image')) {
                    if (!is_dir(public_path("upload/store"))) {
                        mkdir(public_path("upload/store"));
                    }
                    //return $request->file('image');
                    Store::where('id', $data->id)->update(['logo_image' => $this->insert_image($request->file('logo_image'), 'store')]);
                }
                //$publisher_user_id = $publisher_user_data[0]->user->id;
                $request->merge(
                    [
                        'store_id' => $data->id,
                        'role_id' => get_admin_role($request->type),
                        'parent_id' => $publisher_user_id,
                        'password' => Hash::make($request->password),
                        'created_by' => auth()->user()->id,
                    ]
                );
                $user =  User::query()->create($request->except('_token', 'publisher_id'))->toSql();
                // return (DB::getQueryLog());

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
        $districts = District::where('deleted_at', null)->where('state', 'West Bengal')->get();


        return view('admin.v1.store.edit', compact('data', 'page', 'districts'));
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
            'store_name' => 'required|string|unique:stores,store_name,' . $id,
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        }
        try {
            $request->request->add(['updated_by' => auth()->user()->id]);
            Store::where('id', $id)->update($request->except(['_token', '_method']));
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
            Store::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
}
