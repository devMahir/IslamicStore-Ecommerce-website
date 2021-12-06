<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    //============================ Store Brand ====================
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()-> back()->with('success', 'Brand Added');
    }

    //============================ Brand Edit data ====================
    public function edit($brand_id)
    {
        $brand = Brand::find($brand_id);
        return view ('admin.brand.edit', compact('brand'));
    }

    //============================ Update Brand ===================

    public function update(Request $request)
    {
        $request->validate([
            'brand_name' => 'required'
        ]);

        $brand_id = $request -> id;

        Brand::find($brand_id)->update([
            'brand_name' => $request->brand_name,
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()-> route('admin.brand')->with('catUpdated', 'Brand Updated');
    }

    //============================ Delete Brand ===================

    public function delete($brand_id)
    {
        Brand::find($brand_id)->delete();
        return Redirect()->back()->with('delete', 'Brand Deleted');
    }

    //============================ Brand status Inactive ===================
    public function inactive($brand_id)
    {
        Brand::find($brand_id)->update([
            'status' => 0
        ]);
        return Redirect()->back()->with('delete', 'Brand Inactivated');
    }

    //============================ Brand status Active ===================
    public function active($brand_id)
    {
        Brand::find($brand_id)->update([
            'status' => 1
        ]);
        return Redirect()->back()->with('catUpdated', 'Brand Activated');
    }
}
