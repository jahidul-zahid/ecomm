<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function index()
    {
          $coupons=Coupon::latest()->get();

        return view('admin.coupon.index',compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'coupon_name'=>'required|unique:coupons,coupon_name',
           'coupon_discount'=>'required',
        ]);

      Coupon::insert([
        'coupon_name'=>strtoupper($request->coupon_name),
        'discount'=>$request->coupon_discount,
        'created_at'=>Carbon::now()
       ]);
       return redirect()->back()->with('success','Coupon added');
    }

    public function Edit($coupon_id)
    {
          $coupon=Coupon::find($coupon_id);

        return view('admin.coupon.edit',compact('coupon'));
    }


    public function updatecoupon(Request $request)
    {

        $coupon_id=$request->id;
        Coupon::find($coupon_id)->update([
        'coupon_name'=>strtoupper($request->coupon_name),
        'updated_at'=>Carbon::now()
       ]);
       return redirect()->route('admin.coupon')->with('success','Coupon updated');
    }


    public function destroy($coupon_id)
    {
          $coupon=Coupon::find($coupon_id)->delete();

          return redirect()->back()->with('delete','Coupon Deleted Success');
    }


}
