<?php

namespace App\Http\Controllers\Admin\v1;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Store;

class AdminController extends Controller
{
    public $page = 'User Management';

    public function index(Request $request)
    {
       // $this->page = $type;
        $page = $this->page;
        if (auth()->user()->type == "admin") {
            $data = User::with('role')->orderByDesc('id')->get();
           // $data = User::with('role')->where('type', $type)->orderByDesc('id')->get();
        } else {
            $data = User::with('role')->where('created_by', auth()->user()->id)->orderByDesc('id')->get();
        //    $data = User::with('role')->where('type', $type)->where('created_by', auth()->user()->id)->orderByDesc('id')->get();
        }
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.admin.buttons', ['item' => $row, "route" => 'admin', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.v1.admin.index', compact('page', 'data'));
    }

    public function create(Request $request, $type=null)
    {
        $roles = Role::get();
        $type = Role::get();
        $stores = Store::where('deleted_at', null)->get();
        $page = str_replace("-", " ", $type);
        return view('admin.v1.admin.insert', compact('page', 'roles', 'stores', 'type'));
    }


    public function status($id)
    {

        $status = User::find($id);
        if ($status->status == "active") {
            User::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            User::where('id', $id)->update(['status' => 'active']);
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
            'email' => 'required|string|unique:users,email',
            'mobile' => 'required|string|unique:users,mobile',
            'password' => ['required', Password::defaults(), 'confirmed'],
            'role_id' => 'required|numeric',
            'mobile' => 'required|numeric',
            'type' => 'required|string',
            'name' => 'required|string'
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        }
        try {
            if (empty(get_admin_role($request->type))) {
                return response()->json(['error' => "First you have to create the role for " . $request->type]);
            }
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->merge(
                [
                    'password' => Hash::make($request->password),
                    'store_id' => auth()->user()->store_id,
                    'created_by' => auth()->user()->id
                ]
            );
            $user =  User::create($request->except('_token'));

            return response()->json(['success' => $this->page . " SuccessFully gggggg Added "]);
        } catch (Exception $e) {
            // return response()->json(['error' => $this->page . " showing somthing wrong "]);
            return response()->json(['error' => $e->getMessage()]);
        }
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
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|unique:users,email',
            'mobile' => 'required|string|unique:users,mobile',
            'password' => ['required', Password::defaults(), 'confirmed'],
            'role_id' => 'required|numeric',
            'mobile' => 'required|numeric',
            'type' => 'required|string',
            'name' => 'required|string'
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        }
        try {
            if (empty(get_admin_role($request->type))) {
                return response()->json(['error' => "First you have to create the role for " . $request->type]);
            }
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->merge(
                [
                    'password' => Hash::make($request->password),
                    'store_id' => auth()->user()->store_id
                ]
            );
            $user =  User::create($request->except('_token'));

            return response()->json(['success' => $this->page . " SuccessFully Added "]);
        } catch (Exception $e) {
            // return response()->json(['error' => $this->page . " showing somthing wrong "]);
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $data = User::find($id);
        $page = $this->page;
        return view('admin.v1.admin.edit', compact('data', 'page'));
    }

    public function destroy($id)
    {
        try {
            User::destroy($id);
            return "delete";
        } catch (Exception $e) {
            return response()->json('delete',  'This Admin have Permissions So Please remove All permission for this Admin then delete this uesr ');
        }
        return response()->json('delete', $this->page . ' Deleted Successfully !!! ');
    }

    public function change_password($id)
    {
        $page = 'Change Password';
        $data = $id;
        return view('admin.v1.admin.changepassword', compact('data', 'page'));
    }

    public function updatepassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        }
        try {
            User::find($request->id)->update(['password' => Hash::make($request->password)]);
            return response()->json(['success' => " Password SuccessFully Updated "]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function auth_change_password(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        }
        $user = User::find(auth()->user()->id);
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['old_password' => " Old Password not matched with our records"]);
        }
        try {
            $user->update(['password' => Hash::make($request->password)]);
            return response()->json(['success' => " Password SuccessFully Updated "]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function auth_change_password_show()
    {
        $page = auth()->user()->name . " Change Password";
        return view('auth.changepassword', compact('page'));
    }

    public function get_role(Request $request)
    {
        $type = $request->type;
        $roles = Role::where('type', $type)->get();
        echo "<option selected disabled> -Select Role- </option>";
        foreach ($roles as $role) { ?>
            <option value="<?= $role->id ?>"><?= $role->name ?></option>
<?php  }
    }
}
