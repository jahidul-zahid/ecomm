<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipping;use App\Models\OrderItem;
class UserController extends Controller
{
   public function order()
   {

    $orders=Order::where('user_id',Auth::id())->latest()->get();
return view('pages.profile.order',compact('orders'));

   }


   public function orderview($order_id)
   {

        $order=Order::findOrFail($order_id);
        $orderItems=OrderItem::with('product')->where('order_id',$order_id)->get();
        $shipping=Shipping::where('order_id',$order_id)->first();
        return view('pages.profile.order-view',compact('order','orderItems','shipping'));

   }


}
