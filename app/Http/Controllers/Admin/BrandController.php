<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::latest()->get();

        return view('admin.brand.index',compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'brand_name'=>'required|unique:brands,brand_name'

        ]);

      Brand::insert([
        'brand_name'=>$request->brand_name,
        'created_at'=>Carbon::now()
       ]);
       return redirect()->back()->with('success','Brand added');
    }

    public function Edit($brand_id)
    {
          $brand=Brand::find($brand_id);

        return view('admin.brand.edit',compact('brand'));
    }


    public function update(Request $request)
    {

        $brand_id=$request->id;
        $brand=Brand::find($brand_id)->update([
        'brand_name'=>$request->brand_name,
        'updated_at'=>Carbon::now()
       ]);
       return redirect()->route('admin.brand')->with('success','Brand updated');
    }


}
