<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Image;


class ProductController extends Controller
{
    public function addproduct() {

        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('admin.product.add',compact('categories','brands'));
    }


    public function storeproduct(Request $request) {

        $request->validate([

            'product_name'=>'required|max:255',
            'product_code'=>'required|max:255',
            'price'=>'required|max:255',
            'product_quantity'=>'required|max:255',
            'category_id'=>'required|max:255',
            'brand_id'=>'required|max:255',
            'short_description'=>'required',
            'long_description'=>'required',
            'image_one'=>'required|mimes:jpg,jpeg,png,gif',
            'image_two'=>'required|mimes:jpg,jpeg,png,gif',
            'image_three'=>'required|mimes:jpg,jpeg,png,gif',

        ],[

            'category_id.required'=>'select category name',
            'brand_id.required'=>'select brand name',

        ]);


        $image_one = $request->file('image_one');
        $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
        $img_url1 = 'fontend/img/product/upload/'.$name_gen;


        $image_two= $request->file('image_two');
        $name_gen=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
        $img_url2 = 'fontend/img/product/upload/'.$name_gen;


        $image_three = $request->file('image_three');
        $name_gen=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
        $img_url3 = 'fontend/img/product/upload/'.$name_gen;


     Product::insert([

        'category_id'=>$request->category_id,
        'brand_id'=>$request->brand_id,
        'product_name'=>$request->product_name,
        'product_slug'=>str_replace('','-',$request->product_name),
        'product_code'=>$request->product_code,
        'price'=>$request->price,
        'product_quantity'=>$request->product_quantity,
        'short_description'=>$request->short_description,
        'long_description'=>$request->long_description,
        'image_one'=>$img_url1,
        'image_two'=>$img_url2,
        'image_three'=>$img_url3,
        'created_at'=>Carbon::now(),

     ]);
     return redirect()->back()->with('success','Product added');

    }


    public function manageproduct()
    {
          $products=Product::orderBy('id','DESC')->get();

        return view('admin.product.manage',compact('products'));
    }

    public function editproduct($product_id)
    {
         $product=Product::findOrFail($product_id);
         $categories=Category::latest()->get();
         $brands=Brand::latest()->get();

        return view('admin.product.edit',compact('product','categories','brands'));
    }



    public function updateproduct(Request $request)
    {

        $product_id =$request->id;
  Product::find($product_id)->update([

    'category_id'=>$request->category_id,
    'brand_id'=>$request->brand_id,
    'product_name'=>$request->product_name,
    'product_slug'=>str_replace('','-',$request->product_name),
    'product_code'=>$request->product_code,
    'price'=>$request->price,
    'product_quantity'=>$request->product_quantity,
    'short_description'=>$request->short_description,
    'long_description'=>$request->long_description,
    'updated_at'=>Carbon::now(),

 ]);
 return redirect()->route('manage-products')->with('success','Product updated');
    }


   public function updateimage(Request $request)
    {

        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;

        if ($request->has('image_one')) {

            if (file_exists($old_one)) {
                unlink($old_one);
            }

             $image_one = $request->file('image_one');
             $name_gen=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
             Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;

             Product::findOrFail($product_id)->update([

                'image_one'=>$img_url1,

             ]);

             $message='Image updated';

            }




            if ($request->has('image_two')) {

                if (file_exists( $old_two)) {
                    unlink($old_two);
                }

                 $image_two = $request->file('image_two');
                 $name_gen=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                 Image::make($image_two)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
                 $img_url2 = 'fontend/img/product/upload/'.$name_gen;

                 Product::findOrFail($product_id)->update([

                    'image_two'=>$img_url2,

                 ]);

                 $message='Image updated';

                }


                if ($request->has('image_three')) {

                    if (file_exists( $old_three)) {
                        unlink($old_three);
                    }

                     $image_three = $request->file('image_three');
                     $name_gen=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                     Image::make($image_three)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
                     $img_url3 = 'fontend/img/product/upload/'.$name_gen;

                     Product::findOrFail($product_id)->update([

                        'image_three'=>$img_url3,

                     ]);

                     $message='Image updated';

                    }


                    $message='Image updated';

                return redirect()->route('manage-products')->with('success',$message);


    }




  public function destroy($product_id)
    {
        $image= product::find($product_id);
        $img_one= $image->image_one;
        $img_two= $image->image_two;
        $img_three= $image->image_three;

        unlink($img_one);
        unlink($img_two);
        unlink($img_three);




          product::find($product_id)->delete();

          return redirect()->back()->with('delete',' Deleted Success');
    }



    public function inactive($product_id)
    {
        Product::find($product_id)->update(['status' => 0]);

          return redirect()->back()->with('delete','Product Inactive');
    }


    public function active($product_id)
    {
        Product::find($product_id)->update(['status' => 1]);

          return redirect()->back()->with('success','Product Active');
    }



}



