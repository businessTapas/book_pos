<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\StorageLocation; // use for file name(track)
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\StorageSite;

class StorageLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'StorageLocation';
    public function index(Request $request)
    {
        $storage_sites = StorageSite::where('store_id', loginStore()->id)->get();
        $page = $this->page;
        if ($request->ajax()) {
            $data = StorageLocation::with('storage_site')->where('deleted_at', null)->whereIn('storage_site_id', $storage_sites->pluck('id'))->orderByDesc('id')-> get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.storage_location.buttons', ['item' => $row, "route" => 'storagelocations', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action']) // this column should not be escaped?? means
                ->make(true); // it is a response
        }
        return view('admin.v1.storage_location.index', compact('page', 'storage_sites'));
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
        $status = StorageLocation::find($id);
        if ($status->status == "active") {
            StorageLocation::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            StorageLocation::where('id', $id)->update(['status' => 'active']);
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
        // dd($request);
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|unique:storage_locations,name',
            'sub_location_name' => 'required',
            'storage_site_id' => 'required',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {

                $request->merge([
                    'created_by' => auth()->user()->id,
                    'store_id' => loginStore()->id,
                ]);
                $data =  StorageLocation::create($request->except('_token'));
                if ($request->hasFile('icon')) {
                    StorageLocation::where('id', $data->id)->update(['icon' => $this->insert_image($request->file('icon'), 'StorageLocation')]);
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
        $data = StorageLocation::find($id);
        $storage_sites = StorageSite::where('store_id', loginStore()->id)->get();

        $page = $this->page;

        return view('admin.v1.storage_location.edit', compact('data', 'page','storage_sites'));
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
            'name' => 'required|string|unique:storage_locations,name,' . $id,
            'icon' => 'image|mimes:png,jpg',
            'sub_location_name' => 'required',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                StorageLocation::where('id', $id)->update($request->except(['_token', '_method', 'icon']));
                if ($request->hasFile('icon')) {
                    $this->update_images('categories', $id, $request->file('icon'), 'StorageLocation', 'icon');
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
            StorageLocation::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }

    public function getStorageLocationBySiteId(Request $request, $site_id = null)
    {
        
        $myModelQuery =  StorageLocation::where('deleted_at', null);
        if($site_id != null) {
            $myModelQuery->where('storage_site_id', $site_id);
        } else {
            $myModelQuery->where('storage_site_id', $request->storage_site_id);

        }
        $storage_location = $myModelQuery->get();       
        
        return $storage_location;
    }
}
