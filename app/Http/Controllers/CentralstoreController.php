<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class CentralstoreController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create(Request $request)
     {
        return view('admin.v1.centralstorenew.insert');
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
                 $data =  Store::create($request->except('_token','type'));
                 $request->merge(
                     [
                         'store_id' => $data->id,
                         'role_id' => get_admin_role($request->type),
                         'password' => Hash::make($request->password),
                         'created_by' => auth()->user()->id
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
 
