<?php
namespace App\Http\Controllers\Admin\v1;

use App\Models\District;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\GstSlab;

class GstSlabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'GstSLabs';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $data = GstSlab::where('deleted_at',null)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.gst_slab.buttons', ['item' => $row, "route" => 'gstslabs', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.gst_slab.index', compact('page'));
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
        $status = GstSlab::find($id);
        if ($status->status == "active") {
            GstSlab::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            GstSlab::where('id', $id)->update(['status' => 'active']);
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
            'name' => 'required|string|unique:gst_slabs,name',
            // 'tax' => 'required|string|unique:gst_slabs,tax'
            // check  unique: table name, coulmn
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['created_by' => auth()->user()->id]);
                $data =  GstSlab::create($request->except('_token'));
                if ($request->hasFile('icon')) {
                    GstSlab::where('id', $data->id)->update(['icon' => $this->insert_image($request->file('icon'), 'gst_slabs')]);
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
        $data = GstSlab::find($id);
        $page = $this->page;

        return view('admin.v1.gst_slab.edit', compact('data', 'page'));
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
            'name' => 'required|string|unique:gst_slabs,name,' . $id, 
            // unique m datatable k name hoga
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                GstSlab::where('id', $id)->update($request->except(['_token', '_method']));
                
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
            GstSlab::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'),'deleted_by'=>auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
}