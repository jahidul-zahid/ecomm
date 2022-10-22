<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addTowish($product_id){

        if( Auth::check()){

            Wishlist::insert([

                'product_id'=> $product_id,
                'wishqty'=>1,

                'user_id'=>Auth::id(),

             ]);

             return redirect()->back()->with('success','Product added on wishlist');
        }

            else{


        return redirect()->route('login')->with('wisherror','login your account');
         }
    }


public function wishpage() {


$wishlist=Wishlist::where('user_id',Auth::id())->latest()->get();
return view('pages.wishlist',compact('wishlist'));

}


public function destroy($row_id)
{

    $wishlist=Wishlist::where('id',$row_id)->where('user_id',Auth::id())->latest()->delete();
    return redirect()->back()->with('wishlist_delete',' the product removed');
}

}
