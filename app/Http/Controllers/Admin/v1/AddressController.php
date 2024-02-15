<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\Address; // use for file name(track)
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Address';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $data = Address::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.Address.buttons', ['item' => $row, "route" => 'categories', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action']) // this column should not be escaped?? means
                ->make(true); // it is a response
        }

        return view('admin.v1.Address.index', compact('page'));
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
        $status = Address::find($id);
        if ($status->status == "active") {
            Address::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Address::where('id', $id)->update(['status' => 'active']);
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
            'name' => 'required|string|unique:categories,name',
            'icon' => 'required|image|mimes:png,jpg',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['created_by' => auth()->user()->id]);
                $data =  Address::create($request->except('_token'));
                if ($request->hasFile('icon')) {
                    Address::where('id', $data->id)->update(['icon' => $this->insert_image($request->file('icon'), 'Address')]);
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
        $data = Address::find($id);
        $page = $this->page;

        return view('admin.v1.Address.edit', compact('data', 'page'));
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
            'name' => 'required|string|unique:categories,name,' . $id,
            'icon' => 'image|mimes:png,jpg',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                Address::where('id', $id)->update($request->except(['_token', '_method','icon']));
                if ($request->hasFile('icon')) {
                    $this->update_images('categories',$id,$request->file('icon'),'Address','icon');
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
            Address::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'),'deleted_by'=>auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
}
