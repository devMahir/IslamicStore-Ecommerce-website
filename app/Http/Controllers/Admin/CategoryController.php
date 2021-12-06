<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    //============================ Store Category ====================
    public function storeCat(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()-> back()->with('success', 'Category Added');
    }

    //============================ Category Edit data ====================
    public function edit($cat_id)
    {
        $category = Category::find($cat_id);
        return view ('admin.category.edit', compact('category'));
    }

    //============================ Update Category ===================

    public function updateCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $cat_id = $request -> cat_id;

        Category::find($cat_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()-> route('admin.category')->with('catUpdated', 'Category Updated');
    }

    //============================ Delete Category ===================

    public function delete($cat_id)
    {
        Category::find($cat_id)->delete();
        return Redirect()->back()->with('delete', 'Category Deleted');
    }

    //============================ Category status Inactive ===================
    public function inactive($cat_id)
    {
        Category::find($cat_id)->update([
            'status' => 0
        ]);
        return Redirect()->back()->with('delete', 'Category Inactivated');
    }

    //============================ Category status Active ===================
    public function active($cat_id)
    {
        Category::find($cat_id)->update([
            'status' => 1
        ]);
        return Redirect()->back()->with('catUpdated', 'Category Activated');
    }
}
