<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class FontendController extends Controller
{
    public function index()
    {

        $products=Product::where('status',1)->latest()->get();
        $lts_p=Product::where('status',1)->latest()->get();
        $categories=Category::where('status',1)->latest()->get();
        return view('pages.index',compact('products','categories','lts_p'));
    }


    public function productdetail($product_id)
    {
        $product=Product::findOrFail($product_id);
        $category_id=$product->category_id;
        $related_p=Product::where('category_id', $category_id)->where('id','!=',$product_id)->latest()->get();

        return view('pages.product-details',compact('product','related_p'));
    }

    public function myprofile()
    {
return view('pages.home');
    }

    public function shoppage()
    {

        $products=Product::latest()->paginate(3);

        $categories=Category::where('status',1)->latest()->get();
        return view('pages.shop',compact('products','categories'));
    }

    public function catwiseproduct($car_id)
    {

        $products=Product::where('category_id',$car_id)->latest()->paginate(3);

        $categories=Category::where('status',1)->latest()->get();
        return view('pages.cat-product',compact('products','categories'));
    }


}

