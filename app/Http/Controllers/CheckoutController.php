<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Function_;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CheckoutController extends Controller
{
  public function index(){

    if(Auth::check()){

        $subtotal=Cart::all()->where('user_ip',request()->ip())->sum(function($t){

            return  $t->price* $t->product_quantity;
          });

        $carts=Cart::where('user_ip',request()->ip())->get();
        return view('pages.checkout',compact('carts','subtotal'));
    }
    else{

        return redirect()->route('login')->with('wisherror','login your account');
    }

  }
}
