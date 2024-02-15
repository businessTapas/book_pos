<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AuthorController extends Controller
{

    public $page = 'Author';
    public function index(Request $request)
    {
        $page = $this->page;
        if ($request->ajax()) {
            $data = Author::get();
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('status', function ($row) {
                //     $checked = $row->status == 'active' ? 'checked' : '';
                //  return '<div class="form-check form-switch form-switch-md mb-2">
                //   <input class="form-check-input" type="checkbox" id="toggleSwitch_' . $row->id . '" ' . $checked . '>
                //   <label class="form-check-label" for="toggleSwitch_' . $row->id . '"></label>
                //     </div>';
                // })
                ->addColumn('action', function ($row) {
                    $actionBtn = view('admin.v1.author.button',['item' => $row, 'page' => $this->page]);
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
                 }
                 return view('admin.v1.author.index',compact('page'));
                }
        // $author=Author::all();
        // return view('admin.v1.author.index',compact('author'));
    

    public function add()
    {
       return view('admin.v1.author.add');
    }

    public function author_add(Request $request)
    {
        $author = new Author;

        $author->name = $request['name'];
        $author->description = $request['description'];
        
        $author->save();
        return redirect('/author/index');

    }

    public function delete($id)
    {
        $author = Author::find($id);
        if(!is_null($author))
        {
            $author->delete();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $edit= Author::where('id',$id)->first();
        return view('admin.v1.author.editauthor',compact('edit'));
    }

    public function update(Request $request,$id)
    {
        Author::where('id',$id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('auth.index');
    }
}
