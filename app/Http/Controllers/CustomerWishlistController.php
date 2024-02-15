<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerWishlist;
use App\Models\Product;
class CustomerWishlistController extends Controller
{
    public function customerwish()
    {
        $wishlist = CustomerWishlist::with('product','customer')->get();
        return view('admin.v1.customer.wishindex',compact('wishlist'));
    }
    public function centralwishlist()
    {
       $centralwishlist = CustomerWishlist::with('product','customer')->get();
        return view('admin.v1.centralcustomerwishlist.wishlist',compact('centralwishlist'));
    }

    
   
}
