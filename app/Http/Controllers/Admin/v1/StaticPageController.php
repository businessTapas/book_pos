<?php

namespace App\Http\Controllers\Admin\v1;

use Illuminate\Http\Request;
use App\Models\StaticPage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Clinic;
use App\Http\Controllers\Controller;


class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page = 'Static Page';
    public function index(Request $request)
    {
        $page = $this->page;
        $cities = StaticPage::where('deleted_at', null)->get();
        if ($request->ajax()) {
            if (isAdmin()) {
                $data = StaticPage::where('deleted_at', null)->get();
            } else {
                $data = StaticPage::where('deleted_at', null)->where('user_id', auth()->user()->id)->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = view('static_page.buttons', ['item' => $row, "route" => 'static-page', 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('static_page.index', compact('page', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('static_page.insert',['page'=>$this->page]);
    }

    public function status($id)
    {
        $status = StaticPage::find($id);
        if ($status->status == "active") {
            StaticPage::where('id', $id)->update(['status' => 'inactive']);
            return "InActive";
        } else {
            StaticPage::where('id', $id)->update(['status' => 'active']);
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
            'title' => 'required|string',
            'type' => 'required|string',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['created_by' => auth()->user()->id]);
                StaticPage::create($request->except('_token'));
                return redirect()->route('static-page.index')->with(['success' => $this->page . " SuccessFully Added "]);
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
        $data = StaticPage::find($id);
        $page = $this->page;
        return view('static_page.edit', compact('data', 'page'));
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
            'title' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            try {
                $request->request->add(['updated_by' => auth()->user()->id]);
                StaticPage::where('id', $id)->update($request->except(['_token', '_method', 'icon']));
                return redirect()->route('static-page.index')->with(['success' => $this->page . " SuccessFully Updated "]);

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
            StaticPage::where('id', $id)->update(['deleted_at' => date('Y-m-d h:i:s'), 'deleted_by' => auth()->user()->id]);
            return "Delete";
        } catch (Exception $e) {
            return response()->json(["error" => $this->page . "Can't Be Delete this May having some child"]);
        }
    }
}
