<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use App\Models\User;
use App\Models\Brand;
use App\Models\GstSlab;
use App\Models\Product;
use App\Models\Category;
use App\Models\StorageSite;
use Illuminate\Http\Request;
use App\Models\StorageLocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\BookRequest;
class BookRequestController extends Controller
{
    public $page = 'Books';
    public function create(Request $request)
    {
        $data['categories'] =  Category::where('deleted_at', null)->get();
        $data['brands'] = Brand::where('deleted_at', null)->get();
        $data['suppliers'] = User::where('type', 'publisher')->get();
        $data['racks'] = Rack::where('deleted_at', null)->get();
        $data['storage_locations'] = StorageLocation::where('deleted_at', null)->get();
        $data['storage_sites'] = StorageSite::where('deleted_at', null)->get();
        $data['gst_slabs'] = GstSlab::where('deleted_at', null)->get();
        $data['page'] = $this->page;
        
        return view('admin.v1.bookrequest.request', $data);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|unique:book_requests,title',
            'image' => 'required|image|mimes:png,jpg',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            //  try {
                $request->request->add(['created_by' => auth()->user()->id]);
                $data =  BookRequest::create($request->except('_token'));
                if ($request->hasFile('image')) {
                    BookRequest::where('id', $data->id)->update(['image' => $this->insert_image($request->file('image'), 'product')]);
                }
                //  return response()->json(['success' => $this->page . " SuccessFully Added "]);
                   return redirect()->back()->with('success','Book request successfully');
                // return redirect()->route('books.index')->with('success','Book added successfully');
            //  } catch (Exception $e) {
                // return response()->json(['error' => $this->page . " showing somthing wrong "]);
                //  return response()->json(['error' => $e->getMessage()]);

            //    return redirect()->back()->with('error','something went wrong');
             }
    }

       public function bookrequest()
       {
        $book_request= BookRequest::where('status','inactive')->get();
        return view('admin.v1.bookrequest.requestshow',compact('book_request'));
       }

       public function approve($id)
       {
        $user_id= auth()->id();
        $statuses= BookRequest::where('id',$id)->first();

          if($statuses->status == "inactive")
             {
              BookRequest::where('id',$id)
              ->update(['status' => 'active', 'updated_by' => $user_id ]);
            //   return redirect()->back();
             }

           

             $data= BookRequest::where('id',$id)->first();
                      $post = new Product();
                      $post->title= $data->title;
                       $post->category_id = $data->category_id;
                       $post->supplier_id = $data->supplier_id;
                       $post->gst_slab_id = $data->gst_slab_id;
                       $post->created_by = $data->created_by ;
                       $post->author = $data->author;
                       $post->isbn = $data->isbn;
                       $post->price = $data->price;
                       $post->publication_date=$data->publication_date;
                       $post->image = $data->image;
                       $post->language = $data->language;
                       $post->weight = $data->weight;
                       $post->dimensions= $data->dimensions;
                       $post->pages = $data->pages;
                       $post->description= $data->description;
                       $post->save();
                       return  redirect()->back()->with('approve',' Book Approve Successfully');
            }     
        }
           
       
      
    





















































































































































    //     $imageName = null;
    //     $validate = Validator::make($request->all(), [
    //         'title' => 'required|string|unique:products,title',
    //         'image' => 'required|image|mimes:png,jpg',
    //     ]);

    //     if ($validate->passes() && $request->hasFile('image')) {
    //         $imageName = time() . '.' . $request->image->extension();
    //         $request->image->move(public_path('upload/product'), $imageName);
    //       }
    //       $fullPath = 'upload/product/' . $imageName;

    //     if ($validate->fails()) {
    //         return $validate->errors();
    //     } else {
    //            $id = auth()->user()->id;
    //           $post = new Product();
    //           $post->title= $request->title;
    //           $post->created_by = $id;
    //           $post->category_id = $request->category_id;
    //           $post->supplier_id = $request->supplier_id;
    //           $post->gst_slab_id = $request->gst_slab_id;
    //           $post->image = $fullPath;
    //           $post->author = $request->author;
    //           $post->isbn = $request->isbn;
    //           $post->price = $request->price;
    //           $post->publication_date=$request->publication_date;
    //           $post->language = $request->language;
    //           $post->weight = $request->weight;
    //           $post->dimensions= $request->dimensions;
    //           $post->pages = $request->pages;
    //           $post->description= $request->description;
    //           $post->save();
    //     }
    //            return redirect()->back()->with('success','Book request successfully');

    // }

    // }
