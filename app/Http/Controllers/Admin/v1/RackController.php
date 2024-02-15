<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\Rack; // use for file name(track)
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;

use App\Models\StorageLocation;
use App\Models\StorageSite;


class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Rack';
    public function index(Request $request)
    {
        $data['page'] = $this->page;
        $data['storagesite'] = StorageSite::where('deleted_at', null)->where('store_id', loginStore()->id)->get();
        $data['storagelocation'] =  StorageLocation::where('deleted_at', null)->get();
        $storage_sites = StorageSite::where('deleted_at', null)->where('store_id', loginStore()->id)->get();
        $storage_location =  StorageLocation::where('deleted_at', null)->whereIn('storage_site_id', $storage_sites->pluck('id'))->get();
        if ($request->ajax()) {
            $selectedStorageSiteId = $storage_sites->first()->id; // Replace with your logic to get the selected storage site ID
            $selectedStorageLocationId = $storage_location->first()->id; // Replace with your logic to get the selected storage location ID

            // $data = Rack::where('deleted_at', null)
            //     ->when($selectedStorageSiteId, function ($query) use ($selectedStorageSiteId) {
            //         $query->where('storage_site_id', $selectedStorageSiteId);
            //     })
            //     ->when($selectedStorageLocationId, function ($query) use ($selectedStorageLocationId) {
            //         $query->where('storage_location_id', $selectedStorageLocationId);
            //     })
            //     ->get();
                $data = Rack::where('deleted_at', null)->where('created_by' , auth()->user()->id)->orderBy('storage_location_id')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.rack.buttons', ['item' => $row, "route" => 'racks', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action']) // this column should not be escaped?? means
                ->make(true); // it is a response
        }

        return view('admin.v1.rack.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $storagesite = StorageSite::where('deleted_at', null)->get();
        $storagelocation =  StorageLocation::where('deleted_at', null)->get();
        $page = $this->page;
        return view('admin.v1.rack.insert', compact('page', 'storagelocation', 'storagesite'));
    }

    public function status($id)
    {
        $status = Rack::find($id);
        if ($status->status == "active") {
            Rack::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Rack::where('id', $id)->update(['status' => 'active']);
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
            'name' => 'required|string|unique:racks,name',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['created_by' => auth()->user()->id]);
                $data =  Rack::create($request->except('_token'));
                if ($request->hasFile('icon')) {
                    Rack::where('id', $data->id)->update(['icon' => $this->insert_image($request->file('icon'), 'Rack')]);
                }
                return response()->json(['success' => $this->page . " SuccessFully Added "]);
            } catch (Exception $e) {
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
        $data['data'] = Rack::find($id);
        $data['page'] = $this->page;
        $data['storagesite'] = StorageSite::where('deleted_at', null)->where('store_id', loginStore()->id)->get();
        $data['storagelocation'] =  StorageLocation::where('deleted_at', null)->get();

        return view('admin.v1.rack.edit', $data);
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
            'name' => 'required|string|unique:racks,name,' . $id,
            'icon' => 'image|mimes:png,jpg',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                Rack::where('id', $id)->update($request->except(['_token', '_method', 'icon']));
                if ($request->hasFile('icon')) {
                    $this->update_images('categories', $id, $request->file('icon'), 'Rack', 'icon');
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
            Rack::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }

    public function storageSite($id)
    {
        $storage_site = StorageLocation::where('storage_site_idraja', $id)->where('deleted_at', null)->get();
        foreach ($storage_site as $site) {
            echo "<opiton value='" . $site->id . "'>" . $site->name . " </option>";
        }
    }

    public function getRackByStorageLocationId(Request $request, $loc_id = null)
    {

        $myModelQuery =  Rack::where('deleted_at', null);
        if ($loc_id != null) {
            $myModelQuery->where('storage_location_id', $loc_id);
        } else {
            $myModelQuery->where('storage_location_id', $request->storage_location_id);
        }
        $rack = $myModelQuery->get();

        return $rack;
    }
}
