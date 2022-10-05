<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
          $categories=Category::latest()->get();

        return view('admin.category.index',compact('categories'));
    }

    public function storecat(Request $request)
    {
        $request->validate([
           'category_name'=>'required|unique:categories,category_name'

        ]);

       Category::insert([
        'category_name'=>$request->category_name,
        'created_at'=>Carbon::now()
       ]);
       return redirect()->back()->with('success','Category added');
    }

    public function Edit($cat_id)
    {
          $category=Category::find($cat_id);

        return view('admin.category.edit',compact('category'));
    }



    public function updatecat(Request $request)
    {

        $cat_id=$request->id;
        $category=Category::find($cat_id)->update([
        'category_name'=>$request->category_name,
        'updated_at'=>Carbon::now()
       ]);
       return redirect()->route('admin.category')->with('catupdated','Category updated');
    }


    public function Delete($cat_id)
    {
          $category=Category::find($cat_id)->delete();

          return redirect()->back()->with('delete','Category Deleted Success');
    }

    public function inactive($cat_id)
    {
          $category=Category::find($cat_id)->update(['status'=>0]);

          return redirect()->back()->with('catupdated','Category Inactive');
    }


    public function active($cat_id)
    {
          $category=Category::find($cat_id)->update(['status'=>1]);

          return redirect()->back()->with('catupdated','Category Active');
    }

}
