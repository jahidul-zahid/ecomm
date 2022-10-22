<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use Session;
class CartController extends Controller
{
    public function addToCard(Request $request,$product_id){

        $check=Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();

        if( $check){
            Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('product_quantity');

            return redirect()->back()->with('success','Product Added on cart');
        }

            else{

        Cart::insert([

           'product_id'=> $product_id,
           'product_quantity'=>1,
           'price'=>$request->price,
           'user_ip'=>request()->ip(),

        ]);

        return redirect()->back()->with('success','Added');
         }
    }


    public function cartPage()
    {
        $carts=Cart::where('user_ip',request()->ip())->latest()->get();
        $subtotal=Cart::all()->where('user_ip',request()->ip())->sum(function($t){

            return  $t->price* $t->product_quantity;
          });

        return view('pages.cart',compact('carts','subtotal'));
    }

    public function destroy($cart_id)
    {

        $carts=Cart::where('id',$cart_id)->where('user_ip',request()->ip())->latest()->delete();
        return redirect()->back()->with('cart_delete',' Cart product removed');
    }

    public function quantityupdate(Request $request,$cart_id)
    {

        $carts=Cart::where('id',$cart_id)->where('user_ip',request()->ip())->update([ 'product_quantity'=>$request->product_quantity,]);
        return redirect()->back()->with('cart_update',' Quantity updated');
    }

    public function applyCoupon(Request $request)
    {

        $check=Coupon::where('coupon_name',$request->coupon_name)->first();

        if($check){

        Session::put('coupon',[

          'coupon_name' => $check->coupon_name,
          'coupon_discount'=> $check->discount,

        ]);

        return redirect()->back()->with('cart_update',' coupon applied');
        }
        else{

            return redirect()->back()->with('cart_delete','invalid coupon');
        }
    }

    public function coupondestroy()
    {

        if (Session::has('coupon')){

            session()->forget('coupon');

            return redirect()->back()->with('cart_delete','Coupon removed');
        }
    }


}
