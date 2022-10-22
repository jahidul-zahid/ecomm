<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;
class OrderController extends Controller
{
    public function storeorder (Request $request) {





        $request->validate([
            'shipping_first_name'=>'required',
            'shipping_last_name'=>'required',
            'shipping_email'=>'required',
            'shipping_phone'=>'required',
            'post_code'=>'required',
        ]);

                $order_id= Order::insertGetId([

                    'user_id'=>Auth::id(),
                    'payment_type'=>$request->payment_type,
                    'total'=>$request->total,
                    'subtotal'=>$request->subtotal,
                    'coupon_discount'=>$request->coupon_discount,
                    'invoice_no'=>mt_rand(10000000,99999999),
                    'created_at'=>Carbon::now(),
                ]);

                $carts=Cart::where('user_ip',request()->ip())->latest()->get();

                    foreach ($carts as $cart) {
                        # code...


                OrderItem::insert([

                    'order_id'=>$order_id,
                    'product_id'=>$cart->product_id,
                    'product_qty'=>$cart->product_quantity,
                    'created_at'=>Carbon::now(),
                ]);

            }

                Shipping::insert([
                    'order_id'=>$order_id,
                    'shipping_first_name'=>$request->shipping_first_name,
                    'shipping_last_name'=>$request->shipping_last_name,
                    'shipping_email'=>$request->shipping_email,
                    'shipping_phone'=>$request->shipping_phone,
                    'address'=>$request->address,
                    'state'=>$request->state,
                    'post_code'=>$request->post_code,
                    'created_at'=>Carbon::now(),
                ]);

                if (Session::has('coupon')){

                    session()->forget('coupon');

                }

                $carts=Cart::where('user_ip',request()->ip())->delete();

                return redirect()->to('order/success')->with('order-complete',' Your order placed done');


        }



            Public function ordersuccess(){


                return view('pages.order-complete');
            }


}
