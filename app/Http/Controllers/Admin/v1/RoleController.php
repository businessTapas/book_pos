<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Permission;
                                                                                                
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Role';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $data = Role::with('permission')->where('deleted_at', null)->orderByDesc('id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.role.buttons', ['item' => $row, "route" => 'roles', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.v1.role.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $page = $this->page;
        return view('admin.v1.role.insert', compact('page'));
    }

    public function status($id)
    {
        $status = Role::find($id);
        if ($status->status == "active") {
            Role::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            Role::where('id', $id)->update(['status' => 'active']);
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
            'name' => 'required|string',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
             try {
                $request->request->add(['created_by' => auth()->user()->id]);
                $data =  Role::create($request->except('_token'));

                for ($i = 0; $i < count($request->permission); $i++) {
                    Permission::create([
                        'role_id' => $data->id,
                        'name' => $request->permission[$i],
                        'created_by' => auth()->user()->id
                    ]);
                }

                 return response()->json(['success' => $this->page . " SuccessFully Added "]);
                // return redirect()->route('roles.index')->with('success','SuccessFully Added');
             } catch (Exception $e) {
                Role::delete($data->id);
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
        $data = Role::with('permission')->find($id);
        $page = $this->page;

        return view('admin.v1.role.edit', compact('data', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $user_id = auth()->user()->id;
        // $validate = Validator::make($request->all(), [
        //     'name' => 'required|string|unique:roles,name,' . $id,
        // ]);
        // if ($validate->fails()) {
        //     return $validate->errors();
        // } else {
        //     try {
        //         $request->request->add(['updated_by' => auth()->user()->id]);
        //         Role::where('id', $id)->update($request->except(['_token', '_method', 'icon']));
        //         if ($request->hasFile('icon')) {
        //             $this->update_images('categories', $id, $request->file('icon'), 'category', 'icon');
        //         }
        //         return response()->json(['success' => $this->page . " SuccessFully Updated "]);
        //     } catch (Exception $e) {
        //         // return response()->json(['error' => $this->page . " showing somthing wrong "]);
        //         return response()->json(['error' => $e->getMessage()]);
        //     }
        // }

        $validate = Validator::make($request->all(), [
            'permission' => 'required|array',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            $existingPermissions = Permission::where('role_id', $id)->pluck('name')->toArray();

            $permissionsToAdd = array_diff($request->input('permission'), $existingPermissions);
            $permissionsToRemove = array_diff($existingPermissions, $request->input('permission'));

            foreach ($permissionsToAdd as $permission) {
                Permission::create([
                    'role_id' => $id,
                    'name' => $permission,
                    'created_by' => $user_id,
                ]);
            }

            Permission::where('role_id', $id)->whereIn('name', $permissionsToRemove)->delete();

            return redirect()->route('roles.index');
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
            Role::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
}
